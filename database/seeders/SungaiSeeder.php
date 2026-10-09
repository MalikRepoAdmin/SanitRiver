<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use JsonMachine\Items;
use JsonMachine\JsonDecoder\ExtJsonDecoder;
use Throwable;

class SungaiSeeder extends Seeder
{
    /**
     * MariaDB spatial reference system used by the database column.
     *
     * EPSG:4326 = WGS 84, which is the coordinate reference system
     * normally used by GeoJSON longitude/latitude coordinates.
     */
    private const SRID = 4326;

    /**
     * Number of rivers inserted in one database transaction.
     *
     * A smaller batch reduces memory usage and limits the amount of data
     * that has to be rolled back if one batch fails.
     */
    private const BATCH_SIZE = 500;

    /**
     * Path to the source GeoJSON file.
     *
     * Put the large HDX GeoJSON in database/seeders/data/.
     */
    private const GEOJSON_FILE = 'database/seeders/data/idn_waterways_points.geojson';
    
    private const MAX_INSERT_LIMIT = 1000000;

    public function run(): void
    {
        $filePath = base_path(self::GEOJSON_FILE);

        if (! File::exists($filePath)) {
            throw new \RuntimeException(
                "GeoJSON file not found: {$filePath}"
            );
        }

        $this->command?->info(
            'Starting river GeoJSON import...'
        );

        $this->command?->info(
            'File size: ' . $this->formatBytes(File::size($filePath))
        );

        /*
         * JSON Machine reads the GeoJSON feature collection incrementally.
         *
         * A normal json_decode(file_get_contents(...)) approach is unsuitable
         * for a 500+ MB file because both the raw JSON string and the decoded
         * PHP structure can consume a very large amount of memory.
         */
        $features = Items::fromFile(
            $filePath,
            [
                'pointer' => '/features',
                'decoder' => new ExtJsonDecoder(true),
                //'debug' => true,
            ]
        );

        $batch = [];

        $insertedCount = 0;
        $skippedCount = 0;
        $processedCount = 0;
        $batchCount = 0;

        /*
         * Use one timestamp for every row in a batch instead of calling now()
         * repeatedly for every feature.
         */
        $timestamp = now();

        try {
            foreach ($features as $feature) {
            	// IMMEDIATELY EXIT LOOP & STOP READING FILE WHEN LIMIT IS REACHED
                if ($insertedCount >= self::MAX_INSERT_LIMIT) {
                    if (self::MAX_INSERT_LIMIT != 0) {
                        $this->command?->info("Reached limit of " . self::MAX_INSERT_LIMIT . " inserted rows. Stopping.");
                        break;
                    }
                }
            
                $processedCount++;

                if (! is_array($feature)) {
                    dump('Skipped: Not an array');
                    $skippedCount++;

                    continue;
                }

                $properties = $feature['properties'] ?? null;
                $geometry = $feature['geometry'] ?? null;

                if (
                    ! is_array($properties) ||
                    ! is_array($geometry)
                ) {
                    dump('Skipped: Missing properties or geometry', $feature);
                    $skippedCount++;

                    continue;
                }

                $namaSungai = $this->getStringValue($properties, 'name')
                    ?? $this->getStringValue($properties, 'name:id')
                    ?? $this->getStringValue($properties, 'name:en');

                /*
                 * A river without a name is not useful for the current
                 * application because users need to identify the river.
                 */
                if ($namaSungai === null) {
                   $skippedCount++;

                   continue;
                }

                $geometryType = $geometry['type'] ?? null;
                $coordinates = $geometry['coordinates'] ?? null;

                if (! is_array($coordinates)) {
                    $skippedCount++;

                    continue;
                }

                /*
                 * The database column is POINT.
                 *
                 * OSM/HDX data can contain:
                 *
                 *   Point
                 *   
                 */
                $wkt = $this->geoJsonToPointWkt(
                    $geometryType,
                    $coordinates
                );

                if ($wkt === null) {
                    $skippedCount++;

                    continue;
                }

                /*
                 * `is_in` is not guaranteed to be a complete postal address.
                 * It is therefore only used as a best-effort location label.
                 */
                $alamat = $this->getStringValue($properties, 'is_in') ?? 'Indonesia';

                $batch[] = [
                    'nama_sungai' => $namaSungai,
                    'alamat' => $alamat,
                    'status' => 'Belum Terlapor',

                    /*
                     * Keep the source type if the dataset provides it.
                     * Otherwise this remains NULL.
                     */
                    'tipe_sungai' => $this->getStringValue(
                        $properties,
                        'waterway'
                    ),

                    /*
                     * WKT is kept outside the insert data temporarily.
                     *
                     * The actual geometry is inserted using:
                     *
                     * ST_GeomFromText(?, 4326)
                     *
                     * This is handled in flushBatch().
                     */
                    '_wkt' => $wkt,

                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];

                if (count($batch) >= self::BATCH_SIZE) {
                    $this->flushBatch($batch);

                    $insertedCount += count($batch);
                    $batchCount++;

                    $this->reportProgress(
                        $features,
                        $processedCount,
                        $insertedCount,
                        $skippedCount,
                        $filePath
                    );

                    $batch = [];

                    /*
                     * Generate a new timestamp for the next batch.
                     */
                    $timestamp = now();
                }
            }
            

            /*
             * Insert the remaining features after the loop.
             */
            // Flush remaining items if under limit
            if ($batch !== [] && $insertedCount < self::MAX_INSERT_LIMIT) {
                $remainingAllowed = self::MAX_INSERT_LIMIT - $insertedCount;
                if (count($batch) > $remainingAllowed) {
                    $batch = array_slice($batch, 0, $remainingAllowed);
                }

                $this->flushBatch($batch);
                $insertedCount += count($batch);
                $batchCount++;
            }
        } catch (Throwable $exception) {
            $this->command?->error(
                'River import failed: ' . $exception->getMessage()
            );

            throw $exception;
        }

        $this->command?->newLine();

        $this->command?->info(
            'River import completed.'
        );

        $this->command?->info(
            "Processed: {$processedCount}"
        );

        $this->command?->info(
            "Inserted: {$insertedCount}"
        );

        $this->command?->info(
            "Skipped: {$skippedCount}"
        );

        $this->command?->info(
            "Batches: {$batchCount}"
        );
    }

    /**
     * Insert one batch using a single SQL statement.
     *
     * Geometry is passed as a bound parameter instead of concatenating
     * GeoJSON/WKT directly into SQL.
     *
     * This is important because it avoids SQL escaping problems and keeps
     * the geometry data separate from the SQL statement itself.
     */
    private function flushBatch(array $batch): void
    {
        if ($batch === []) {
            return;
        }

        $values = [];
        $bindings = [];

        foreach ($batch as $row) {
            $values[] = '(?, ?, ?, ?, ST_GeomFromText(?, ?), ?, ?)';

            $bindings[] = $row['nama_sungai'];
            $bindings[] = $row['alamat'];
            $bindings[] = $row['status'];
            $bindings[] = $row['tipe_sungai'];

            /*
             * WKT geometry.
             */
            $bindings[] = $row['_wkt'];

            /*
             * SRID.
             */
            $bindings[] = self::SRID;

            $bindings[] = $row['created_at'];
            $bindings[] = $row['updated_at'];
        }

        /*
         * Every batch gets its own transaction.
         *
         * Therefore:
         *
         * - successful batches stay committed;
         * - a failed batch is completely rolled back;
         * - we do not keep a transaction open for the entire 500+ MB import.
         */
        DB::transaction(function () use ($values, $bindings): void {
            DB::insert(
                '
                    INSERT INTO sungais
                    (
                        nama_sungai,
                        alamat,
                        status,
                        tipe_sungai,
                        geometri,
                        created_at,
                        updated_at
                    )
                    VALUES ' . implode(', ', $values),
                $bindings
            );
        });
    }

    /**
     * Convert GeoJSON into WKT (Well-Known Text)
     */
    private function geoJsonToPointWkt(
        mixed $geometryType,
        mixed $coordinates
    ): ?string {
        if ($geometryType !== 'Point') {
            return null;
        }

        if (
            ! is_array($coordinates) ||
            count($coordinates) < 2
        ) {
            return null;
        }

        $longitude = $coordinates[0];
        $latitude = $coordinates[1];

        if (
            ! is_numeric($longitude) ||
            ! is_numeric($latitude)
        ) {
            return null;
        }

        $longitude = (float) $longitude;
        $latitude = (float) $latitude;

        if (
            ! is_finite($longitude) ||
            ! is_finite($latitude) ||
            $longitude < -180 ||
            $longitude > 180 ||
            $latitude < -90 ||
            $latitude > 90
        ) {
            return null;
        }

        return 'POINT(' .
            $this->formatCoordinate($longitude) . ' ' .
            $this->formatCoordinate($latitude) .
            ')';
    }

    /**
     * Safely format a floating-point coordinate for WKT.
     */
    private function formatCoordinate(float $coordinate): string
    {
        /*
         * 15 significant digits is more than enough for normal WGS84
         * longitude/latitude data while avoiding scientific notation.
         */
        $formatted = sprintf('%.15f', $coordinate);

        /*
         * Remove unnecessary trailing zeroes.
         */
        $formatted = rtrim($formatted, '0');
        $formatted = rtrim($formatted, '.');

        /*
         * Avoid producing an empty string for zero.
         */
        return $formatted === '' || $formatted === '-0'
            ? '0'
            : $formatted;
    }

    /**
     * Get a non-empty string property from the GeoJSON properties.
     */
    private function getStringValue(
        array $properties,
        string $key
    ): ?string {
        $value = $properties[$key] ?? null;

        if (! is_string($value)) {
            return null;
        }

        $value = trim($value);

        return $value !== ''
            ? $value
            : null;
    }

    /**
     * Display import progress based on the byte position reported by
     * JSON Machine.
     */
    private function reportProgress(
        Items $features,
        int $processedCount,
        int $insertedCount,
        int $skippedCount,
        string $filePath
    ): void {
        $fileSize = File::size($filePath);

        $position = $features->getPosition();

        $percentage = $fileSize > 0
            ? ($position / $fileSize) * 100
            : 0;

        $this->command?->info(
            sprintf(
                'Progress: %.1f%% | Processed: %d | Inserted: %d | Skipped: %d',
                min($percentage, 100),
                $processedCount,
                $insertedCount,
                $skippedCount
            )
        );
    }

    /**
     * Convert bytes to a human-readable value.
     */
    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $unitIndex = 0;
        $size = $bytes;

        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }

        return sprintf(
            '%.2f %s',
            $size,
            $units[$unitIndex]
        );
    }
}

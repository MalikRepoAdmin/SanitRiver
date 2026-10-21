<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseMetric extends Model
{
    protected $table = null;

    public static function getTableStorageMetrics()
    {
        $dbName = DB::connection()->getDatabaseName();

        // 1. Ambil ukuran data & indeks dari information_schema (tetap dipertahankan)
        $metrics = DB::select("
            SELECT 
                TABLE_NAME as nama_tabel,
                ROUND(DATA_LENGTH / 1024 / 1024, 2) as ukuran_mb,
                ROUND(INDEX_LENGTH / 1024 / 1024, 2) as ukuran_indeks_mb
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = :dbName
            AND TABLE_NAME IN ('users', 'sungais', 'laporan_sungais', 'gambar_sungais')
        ", ['dbName' => $dbName]);

        foreach ($metrics as $metric) {
            $metric->total_baris = DB::table($metric->nama_tabel)->count();
        }

        return $metrics;
    }
}
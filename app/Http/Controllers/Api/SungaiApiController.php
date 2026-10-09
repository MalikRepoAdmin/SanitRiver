<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sungai;
use Illuminate\Http\Request;

class SungaiApiController extends Controller
{
    public function getWaterways(Request $request)
    {
        // 1. Tangkap koordinat Bounding Box dari AJAX Leaflet
        $swLat = $request->query('swLat');
        $swLng = $request->query('swLng');
        $neLat = $request->query('neLat');
        $neLng = $request->query('neLng');
        $zoom = (int) $request->query('zoom', 5);

        if (! $swLat || ! $swLng || ! $neLat || ! $neLng) {
            return response()->json(['type' => 'FeatureCollection', 'features' => []]);
        }

        // 2. Query dasar menggunakan Scope Spasial
        $query = Sungai::withGeoJson();

        // 3. Buat poligon pembatas layar (WKT Polygon)
        $polygonWkt = "POLYGON(($swLng $swLat, $neLng $swLat, $neLng $neLat, $swLng $neLat, $swLng $swLat))";

        // 4. Ambil data sungai yang berpotongan (Intersects) dengan layar
        $sungais = $query->whereRaw('ST_Intersects(geometri, ST_GeomFromText(?, 4326))', [$polygonWkt])
            ->limit(400) // Batasan aman render per gerakan layar
            ->get();

        // 5. Mapping data sesuai nama kolom properti Model Anda
        $features = $sungais->map(function ($sungai) {
            return [
                'type' => 'Feature',
                'properties' => [
                    'id' => $sungai->sungai_id, // Menggunakan sungai_id sesuai model
                    'nama' => $sungai->nama_sungai,
                    'alamat' => $sungai->alamat,
                    'status' => $sungai->status,
                    'tipe' => $sungai->tipe_sungai,
                ],
                'geometry' => json_decode($sungai->geojson_string),
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features,
        ]);
    }

    // public function getWaterways(Request $request)
    // {
    //     $sungai = Sungai::withGeoJson()
    //         ->whereNotNull('geometri')
    //         ->first();

    //     dd([
    //         'raw' => $sungai->geojson_string,
    //         'type' => gettype($sungai->geojson_string),
    //         'decoded' => json_decode($sungai->geojson_string),
    //         'error' => json_last_error_msg(),
    //     ]);
    // }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sungai;
use App\Models\LaporanSungai;

class DashboardApiController extends Controller
{
    /**
     * Return summary statistics for the homepage.
     */
    public function getSummary()
    {
        return response()->json([
            'total_sungai' => Sungai::count(),

            'total_laporan' => LaporanSungai::count(),

        ]);
    }
}
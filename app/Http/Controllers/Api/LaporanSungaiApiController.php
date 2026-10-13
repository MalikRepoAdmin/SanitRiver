<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LaporanSungai;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;

class DashboardApiController extends Controller
{
    public function getLatestLaporans()
    {
        $laporanSungais = LaporanSungai::with(['sungai','gambarsungai'])->latest()->paginate(5);

        return view('index', compact($laporanSungais));
    }

    public function search(Request $request)
    {
        // 1. Inisialisasi query builder
        $query = LaporanSungai::query();

        $laporansungais = $this->applySearch($query, $request->query('search'))->paginate(10)->withQueryString();

        return view('dashboard.user_dashboard', compact(['$laporansungais']));
    }

    private function applySearch(Builder $query, ?string $search) 
    {
        if (blank($search)) return $query;

        return $query->where(function ($q) use ($search) 
        {
            $q->whereHas('sungai', function ($sungaiQuery) use ($search)
            {
                $sungaiQuery->where('nama_sungai', 'like', "%{$search}%");
            });
        });
    }

    public function filter(Request $request)
    {
        //
    }
}
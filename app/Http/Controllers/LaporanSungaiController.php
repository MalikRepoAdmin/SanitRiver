<?php

namespace App\Http\Controllers;

use App\Models\LaporanSungai;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class LaporanSungaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LaporanSungai::with(['user', 'sungai', 'gambarSungais'])->get();

        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display create form for LaporanSungai']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'sungai_id' => 'required|exists:sungais,sungai_id',
            'status' => 'nullable|string',
            'persetujuan' => 'nullable',
        ]);

        $laporan = LaporanSungai::create($data);

        return response()->json($laporan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanSungai $laporanSungai)
    {
        $laporanSungai->load(['user', 'sungai', 'gambarSungais']);

        return response()->json($laporanSungai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanSungai $laporanSungai)
    {
        return response()->json(['message' => 'Display edit form', 'data' => $laporanSungai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanSungai $laporanSungai)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,user_id',
            'sungai_id' => 'nullable|exists:sungais,sungai_id',
            'status' => 'nullable|string',
            'persetujuan' => 'nullable',
        ]);

        $laporanSungai->update($data);

        return response()->json($laporanSungai);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanSungai $laporanSungai)
    {
        // Optionally detach/delete related images if needed; keep simple here.
        $laporanSungai->delete();

        return response()->json(['message' => 'Deleted']);
    }
}

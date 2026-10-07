<?php

namespace App\Http\Controllers;

use App\Models\Sungai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SungaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Sungai::with(['gambarSungais', 'laporanSungais'])->get();

        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display create form for Sungai']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_sungai' => 'required|string',
            'alamat' => 'nullable|string',
            'status' => 'nullable|string',
            'tipe_sungai' => 'nullable|string',
            'geometri' => 'nullable',
        ]);

        $sungai = Sungai::create($data);

        return response()->json($sungai, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sungai $sungai)
    {
        $sungai->load(['gambarSungais', 'laporanSungais']);

        return response()->json($sungai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sungai $sungai)
    {
        return response()->json(['message' => 'Display edit form', 'data' => $sungai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sungai $sungai)
    {
        $data = $request->validate([
            'nama_sungai' => 'nullable|string',
            'alamat' => 'nullable|string',
            'status' => 'nullable|string',
            'tipe_sungai' => 'nullable|string',
            'geometri' => 'nullable',
        ]);

        $sungai->update($data);

        return response()->json($sungai);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sungai $sungai)
    {
        // Optionally delete associated images
        foreach ($sungai->gambarSungais as $g) {
            if ($g->file_path) {
                Storage::disk('public')->delete($g->file_path);
            }
            $g->delete();
        }

        $sungai->delete();

        return response()->json(['message' => 'Deleted']);
    }
}

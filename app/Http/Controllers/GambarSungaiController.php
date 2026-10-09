<?php

namespace App\Http\Controllers;

use App\Models\GambarSungai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarSungaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = GambarSungai::all();

        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display create form for GambarSungai']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'required|file|image',
            'imageable_type' => 'nullable|string',
            'imageable_id' => 'nullable|integer',
        ]);

        $path = $request->file('file')->store('gambar_sungais', 'public');

        // Attach to polymorphic owner if provided
        $type = $request->input('imageable_type');
        $id = $request->input('imageable_id');

        if ($type && $id) {
            if (! str_contains($type, '\\')) {
                $type = 'App\\Models\\' . ucfirst($type);
            }

            if (class_exists($type)) {
                $owner = $type::find($id);
                if ($owner) {
                    $gambar = $owner->gambarSungais()->create(['file_path' => $path]);

                    return response()->json($gambar, 201);
                }
            }
        }

        $gambar = GambarSungai::create(['file_path' => $path]);

        return response()->json($gambar, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GambarSungai $gambarSungai)
    {
        return response()->json($gambarSungai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GambarSungai $gambarSungai)
    {
        return response()->json(['message' => 'Display edit form', 'data' => $gambarSungai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GambarSungai $gambarSungai)
    {
        $data = $request->validate([
            'file' => 'nullable|file|image',
        ]);

        if ($request->hasFile('file')) {
            // delete old file if exists
            if ($gambarSungai->file_path) {
                Storage::disk('public')->delete($gambarSungai->file_path);
            }

            $path = $request->file('file')->store('gambar_sungais', 'public');
            $gambarSungai->file_path = $path;
        }

        $gambarSungai->save();

        return response()->json($gambarSungai);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GambarSungai $gambarSungai)
    {
        if ($gambarSungai->file_path) {
            Storage::disk('public')->delete($gambarSungai->file_path);
        }

        $gambarSungai->delete();

        return response()->json(['message' => 'Deleted']);
    }
}

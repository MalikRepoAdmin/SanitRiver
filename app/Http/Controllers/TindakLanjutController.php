<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TindakLanjut;
use App\Models\LaporanSungai;


class TindakLanjutController extends Controller
{
    public function index(LaporanSungai $laporanSungai)
    {
        // Load relasi agar rapi
        $tindakLanjuts = $laporanSungai->tindakLanjuts()->latest()->get();
        return view('tindak_lanjut.index', compact('laporanSungai', 'tindakLanjuts'));
    }

    public function store(Request $request, LaporanSungai $laporanSungai)
    {
        $validated = $request->validate([
            'petugas' => 'required|string|max:100',
            'tindakan' => 'required|string|min:10',
            'status' => 'required|in:pending,proses,selesai',
            'tanggal_tindak_lanjut' => 'required|date',
        ]);

        // Simpan otomatis dengan foreign key kustom
        $laporanSungai->tindakLanjuts()->create($validated);

        return redirect()->route('tindak-lanjut.index', $laporanSungai->laporansungai_id)
            ->with('success', 'Data tindak lanjut berhasil ditambahkan!');
    }

    public function update(Request $request, TindakLanjut $tindakLanjut)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        $tindakLanjut->update($validated);

        return redirect()->back()->with('success', 'Status tindak lanjut berhasil diperbarui!');
    }

    public function destroy(TindakLanjut $tindakLanjut)
    {
        $tindakLanjut->delete();
        return redirect()->back()->with('success', 'Data tindak lanjut berhasil dihapus!');
    }
}

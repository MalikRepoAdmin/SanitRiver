<?php

namespace App\Http\Controllers;

use App\Models\PemeliharaanSungai;
use App\Models\Sungai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PemeliharaanSungaiController extends Controller
{
    public function index(): View
    {
        $pemeliharaans = PemeliharaanSungai::with(['sungai', 'user'])
            ->orderByDesc('tanggal')
            ->get();

        return view('pemeliharaan.index', compact('pemeliharaans'));
    }

    public function create(): View
    {
        $sungais = Sungai::orderBy('nama_sungai')->get();

        return view('pemeliharaan.create', compact('sungais'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sungai_id' => ['required', 'exists:sungais,sungai_id'],
            'judul' => ['required', 'string', 'max:150'],
            'jenis_kegiatan' => ['required', 'string', 'in:Pembersihan,Penyisiran Sampah,Pengecekan Kualitas Air,Penggalian Dan Pembersihan,Tebing,Perbaikan Saluran,Lainnya'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'string', 'in:Direncanakan,Sedang Dilakukan,Selesai,Dibatalkan'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $validated['user_id'] = Auth::id();

        PemeliharaanSungai::create($validated);

        return redirect()->route('pemeliharaan.index')->with('success', 'Kegiatan pemeliharaan berhasil ditambahkan.');
    }

    public function edit(PemeliharaanSungai $pemeliharaan): View
    {
        $sungais = Sungai::orderBy('nama_sungai')->get();

        return view('pemeliharaan.edit', compact('pemeliharaan', 'sungais'));
    }

    public function update(Request $request, PemeliharaanSungai $pemeliharaan)
    {
        $fakeValidated = $request->validate([
            'sub_judul' => ['required'],
        ]);

        $validated = $request->validate([
            'sungai_id' => ['required', 'exists:sungais,sungai_id'],
            'judul' => ['required', 'string', 'max:150'],
            'jenis_kegiatan' => ['required', 'string', 'in:Pembersihan,Penyisiran Sampah,Pengecekan Kualitas Air,Penggalian Dan Pembersihan,Tebing,Perbaikan Saluran,Lainnya'],
            'tanggal' => ['required', 'date'],
            'status' => ['required', 'string', 'in:Direncanakan,Sedang Dilakukan,Selesai,Dibatalkan'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        $validated['user_id'] = Auth::id() ?? $pemeliharaan->user_id;

        $pemeliharaan->update($validated);

        return redirect()->route('pemeliharaan.index')->with('success', 'Kegiatan pemeliharaan berhasil diperbarui.');
    }

    public function destroy(PemeliharaanSungai $pemeliharaan)
    {
        $pemeliharaan->delete();

        return redirect()->route('pemeliharaan.index')->with('success', 'Kegiatan pemeliharaan berhasil dihapus.');
    }
}

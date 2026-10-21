<?php

namespace App\Http\Controllers;

use App\Models\UsulanInfrastruktur;
use App\Models\Sungai;
use Illuminate\Http\Request;

class UsulanInfrastrukturController extends Controller
{
    public function index()
    {
        $usulan = UsulanInfrastruktur::all();
        return view('usulan.index', compact('usulan'));
    }

    public function create()
    {
        $sungaiList = Sungai::all();
        return view('usulan.create', compact('sungaiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi_usulan' => 'required',
            'jenis_infrastruktur' => 'required',
            'jumlah_barang' => 'required|integer|min:1', // Validasi jumlah barang
            'alasan_kebutuhan' => 'required|min:10',
            'tingkat_urgensi' => 'required|in:Tinggi,Sedang,Rendah'
        ]);

        UsulanInfrastruktur::create($request->all());
        return redirect()->route('usulan-infrastruktur.index')->with('success', 'Usulan infrastruktur berhasil dikirim!');
    }
    
    public function edit(UsulanInfrastruktur $usulanInfrastruktur)
    {
        $sungaiList = Sungai::all();
        return view('usulan.edit', compact('usulanInfrastruktur', 'sungaiList'));
    }

    public function update(Request $request, UsulanInfrastruktur $usulanInfrastruktur)
    {
        $request->validate([
            'lokasi_usulan' => 'required',
            'jenis_infrastruktur' => 'required',
            'jumlah_barang' => 'required|integer|min:1', // Validasi jumlah barang
            'alasan_kebutuhan' => 'required|min:10',
            'tingkat_urgensi' => 'required|in:Tinggi,Sedang,Rendah'
        ]);

        $usulanInfrastruktur->update($request->all());
        return redirect()->route('usulan-infrastruktur.index')->with('success', 'Usulan infrastruktur berhasil diperbarui!');
    }

    public function destroy(UsulanInfrastruktur $usulanInfrastruktur)
    {
        $usulanInfrastruktur->delete();
        return redirect()->route('usulan-infrastruktur.index')->with('success', 'Data usulan dihapus!');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;

class LaporanSungaiLivewire extends Component
{
    /**
     * Properties
     */
    public Collection $laporansungais;

    
    public function render()
    {
        return view('livewire.laporan-sungai');
    }

    public function index()
    {
        return LaporanSungai::with(['user', 'sungai', 'gambarSungais'])->get();
    }

    public function store(array $data)
    {
        $v = Validator::make($data, [
            'user_id' => 'required|exists:users,user_id',
            'sungai_id' => 'required|exists:sungais,sungai_id',
            'status' => 'nullable|string',
        ]);

        $v->validate();

        return LaporanSungai::create($data);
    }

    public function show($id)
    {
        return LaporanSungai::with(['user', 'sungai', 'gambarSungais'])->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $laporan = LaporanSungai::findOrFail($id);

        $v = Validator::make($data, [
            'user_id' => 'nullable|exists:users,user_id',
            'sungai_id' => 'nullable|exists:sungais,sungai_id',
            'status' => 'nullable|string',
        ]);

        $v->validate();

        $laporan->update($data);

        return $laporan;
    }

    public function destroy($id)
    {
        $laporan = LaporanSungai::findOrFail($id);
        $laporan->delete();

        return ['message' => 'Deleted'];
    }
}

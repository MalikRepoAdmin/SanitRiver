<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use App\Models\Sungai;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class CreateLaporanLivewire extends Component
{
    /**
     * Properties
     */
    public $sungai; // Untuk menampung seluruh data sungai (opsional, berguna untuk nampil di view)
    public $sungai_id; // Untuk keperluan insert/save ke tabel laporan nanti

    /**
     * Parameter $id di sini otomatis diambil dari URL /sungai/{id}/laporan
     */
    public function mount($id)
    {
        // Cari data sungai berdasarkan ID. 
        // Jika ID tidak ada di database, otomatis menampilkan halaman 404 Not Found.
        $this->sungai = Sungai::findOrFail($id);

        // Simpan id sungai untuk digunakan saat menyimpan form nanti
        $this->sungai_id = $this->sungai->id;
    }
    
    
    public function render()
    {
        return view('livewire.create-laporan');
    }
}
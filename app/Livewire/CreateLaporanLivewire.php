<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LaporanSungai;
use App\Models\Sungai;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class CreateLaporanLivewire extends Component
{
    /**
     * Properties
     */
    public $sungai;
    public $sungai_id;

    // Property untuk form
    public $status = '';

    protected $listeners = ['trigger-store' => 'store'];

    /**
     * Mount — ambil data sungai dari URL /sungai/{id}/laporan
     */
    public function mount($id)
    {
        $this->sungai    = Sungai::findOrFail($id);
        $this->sungai_id = $this->sungai->sungai_id;
    }


    /**
     * Simpan laporan
     */
    public function store()
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            session()->flash('error', 'Silakan login terlebih dahulu untuk mengirim laporan.');
            return redirect()->route('login');
        }

        // dd('MASUK STORE', [
        //     'sungai_id' => $this->sungai_id,
        //     'status'    => $this->status,
        //     'auth'      => Auth::check(),
        //     'user'      => Auth::user(),
        // ]);

        // Simpan ke database
        $laporan = LaporanSungai::create([
            'user_id'   => Auth::id(),
            'sungai_id' => $this->sungai_id,
            'status'    => $this->status,
        ]);

        // Flash message sukses
        session()->flash('success', 'Laporan berhasil dikirim.');

        // Redirect ke halaman detail / daftar laporan
        return redirect()->route('sungai.laporan');
    }

    public function render()
    {
        return view('livewire.create-laporan');
    }
}
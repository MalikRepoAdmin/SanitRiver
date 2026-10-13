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
     * Aturan validasi
     */
    protected function rules()
    {
        return [
            'sungai_id' => 'required|exists:sungais,sungai_id',
            'status'    => 'required|in:Bersih,Cukup Bersih,Kurang Bersih,Tercemar',
        ];
    }

    /**
     * Pesan validasi (opsional, biar bahasa Indonesia)
     */
    protected function messages()
    {
        return [
            'status.required' => 'Status laporan wajib dipilih.',
            'status.in'       => 'Status laporan tidak valid.',
        ];
    }

    /**
     * Simpan laporan
     */
    public function store()
    {
        dd('MASUK STORE', [
            'sungai_id' => $this->sungai_id,
            'status'    => $this->status,
            'auth'      => Auth::check(),
            'user'      => Auth::user(),
        ]);

        // Validasi input
        $this->validate();

        // Pastikan user sudah login
        if (!Auth::check()) {
            session()->flash('error', 'Silakan login terlebih dahulu untuk mengirim laporan.');
            return redirect()->route('login');
        }

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
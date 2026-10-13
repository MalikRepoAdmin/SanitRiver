<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LaporanSungai;
use Livewire\Attributes\Layout;

class LaporanSungaiLivewire extends Component
{
    use WithPagination;

    public string $search  = '';
    public string $wilayah = 'dki';
    public string $urutan  = 'terbaru';
    public string $status  = 'semua';

    protected $queryString = [
        'search'  => ['except' => ''],
        'wilayah' => ['except' => 'dki'],
        'urutan'  => ['except' => 'terbaru'],
        'status'  => ['except' => 'semua'],
    ];

    public function updatingSearch()  { $this->resetPage(); }
    public function updatingWilayah() { $this->resetPage(); }
    public function updatingUrutan()  { $this->resetPage(); }
    public function updatingStatus()  { $this->resetPage(); }

    #[Layout('components.layouts.app')]
    public function render()
    {
        $query = LaporanSungai::with(['user', 'sungai', 'gambarSungais']);

        // Filter status
        if ($this->status !== 'semua') {
            $query->where('status', 'like', '%' . $this->status . '%');
        }

        // Search nama / alamat sungai
        if ($this->search) {
            $query->whereHas('sungai', function ($q) {
                $q->where('nama_sungai', 'like', '%' . $this->search . '%')
                  ->orWhere('alamat', 'like', '%' . $this->search . '%');
            });
        }

        // Urutan
        match ($this->urutan) {
            'terlama' => $query->oldest(),
            'populer' => $query->withCount('gambarSungais')
                              ->orderByDesc('gambar_sungais_count'),
            default   => $query->latest(),
        };

        return view('livewire.laporan-sungai', [
            'laporansungais' => $query->paginate(200),
        ]);
    }
}
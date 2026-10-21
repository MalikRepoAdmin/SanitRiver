<x-layouts.app>

<!-- PEMISAHAN ASSET DESKRIPTIF: Memanggil file CSS khusus metrik database -->
<link rel="stylesheet" href="{{ asset('css/database-metric.css') }}">

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h1 class="h2 font-weight-bold text-dark mb-1">📊 Database Metrics Engine</h1>
            <p class="text-muted mb-0">Modul Independen UTS - Analisis Performa Penyimpanan Data & Kueri ORM.</p>
        </div>
        
        <!-- OPERASI CRUD: CREATE BUTTON -->
        <form action="{{ route('database.metric.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-md fw-bold shadow-sm">➕ Create 30 Laporan</button>
        </form>
    </div>

    <!-- Alert Notifikasi Sukses Operasi CRUD -->
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4 alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Bagian Informasi Metrik Ringkas -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="card p-4 text-white shadow-sm" style="background: linear-gradient(45deg, #1e3c72, #2a5298); border: none; border-radius: 0.5rem;">
                <div class="small text-uppercase font-weight-bold opacity-75">Kecepatan I/O Database</div>
                <div class="display-6 font-weight-bold my-2">{{ number_format($executionTimeMs, 2) }} <span class="fs-5">ms</span></div>
                <span class="badge bg-white text-primary font-weight-bold align-self-start">{{ $totalQueries }} Active Query</span>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
            <div class="card p-4 text-dark shadow-sm" style="background: linear-gradient(45deg, #f1c40f, #f39c12); border: none; border-radius: 0.5rem;">
                <div class="small text-uppercase font-weight-bold opacity-75">Alokasi Memory Core</div>
                <div class="display-6 font-weight-bold my-2">{{ $memoryUsed }} <span class="fs-5">MB</span></div>
                <span class="badge bg-dark text-white font-weight-bold align-self-start">Status: Ringan</span>
            </div>
        </div>
    </div>

    <!-- OPERASI CRUD: READ & DELETE TABLE -->
    <div class="card shadow-sm border-0" style="border-radius: 0.5rem; overflow: hidden;">
        <div class="card-header bg-dark text-white font-weight-bold p-3 border-0">
            Status Ruang Penyimpanan Tabel Sistem (READ OPERATION)
        </div>
        <div class="table-responsive">
            <table class="table mb-0 align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nama Tabel</th>
                        <th>Total Baris</th>
                        <th>Ukuran Data (MB)</th>
                        <th>Ukuran Indeks (MB)</th>
                        <th>Manajemen Aksi CRUD</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($storageMetrics as $metric)
                        <tr>
                            <td><code style="color: #d63384; font-weight: bold;">{{ $metric->nama_tabel }}</code></td>
                            <td><strong>{{ number_format($metric->total_baris) }}</strong> baris</td>
                            <td>{{ $metric->ukuran_mb }} MB</td>
                            <td>{{ $metric->ukuran_indeks_mb }} MB</td>
                            <td>
                                @if($metric->nama_tabel == 'laporan_sungais')
                                    <form action="{{ route('database.metric.destroy', 1) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data laporan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger fw-bold btn-delete-action">🗑️ Clear Data</button>
                                    </form>
                                @else
                                    <span class="badge bg-secondary px-2 py-1 text-white">Protected Table</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Gagal memuat struktur data tabel kelompok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/metric-script.js') }}"></script>

</x-layouts.app>
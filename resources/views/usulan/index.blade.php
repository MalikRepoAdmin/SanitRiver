@extends('components.layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color: #00685F;">Daftar Usulan Infrastruktur Sanitasi</h3>
        <a href="{{ route('usulan-infrastruktur.create') }}" class="btn text-white fw-bold" style="background-color: #00685F; border-radius: 8px; padding: 10px 20px;">
            + Tambah Usulan Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="color: #00685F;">Lokasi</th>
                        <th style="color: #00685F;">Jenis Infrastruktur</th>
                        <th style="color: #00685F;">Alasan</th>
                        <th style="color: #00685F;">Urgensi</th>
                        <th style="color: #00685F;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usulan as $item)
                    <tr>
                        <td class="fw-semibold text-dark">{{ $item->lokasi_usulan }}</td>
                        <td>{{ $item->jenis_infrastruktur }}</td>
                        <td class="text-muted" style="max-width: 250px;">{{ $item->alasan_kebutuhan }}</td>
                        <td>
                            @if($item->tingkat_urgensi == 'Tinggi')
                                <span class="badge bg-danger px-3 py-2">Tinggi</span>
                            @elseif($item->tingkat_urgensi == 'Sedang')
                                <span class="badge bg-warning text-dark px-3 py-2">Sedang</span>
                            @else
                                <span class="badge bg-success px-3 py-2">Rendah</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('usulan-infrastruktur.edit', $item->id) }}" class="btn btn-sm btn-outline-warning px-3 me-1">
                                Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('usulan-infrastruktur.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger px-3" onclick="return confirm('Yakin ingin menghapus usulan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada usulan infrastruktur yang diajukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
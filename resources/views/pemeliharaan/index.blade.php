@extends('pemeliharaan.layouts.app')

@section('title', 'Pemeliharaan Sungai')

@section('content')
    <div class="maintenance-page">
        <div class="maintenance-wrapper">
            <div class="maintenance-header">
                <div>
                    <h2 class="maintenance-title">Pemeliharaan Sungai</h2>
                    <p class="maintenance-subtitle">Daftar kegiatan pemeliharaan dan monitoring kualitas lingkungan sungai.
                    </p>
                </div>
                <a href="{{ route('pemeliharaan.create') }}" class="btn maintenance-primary-btn">+ Tambah Kegiatan</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($pemeliharaans->isEmpty())
                <div class="alert alert-light border">Belum ada data pemeliharaan sungai.</div>
            @else
                <div class="maintenance-grid">
                    @foreach ($pemeliharaans as $item)
                        <div class="maintenance-card">
                            <div class="maintenance-card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <span class="maintenance-badge">{{ $item->jenis_kegiatan }}</span>
                                        <h5 class="maintenance-card-title">{{ $item->judul }}</h5>
                                    </div>
                                    <span class="maintenance-status @if ($item->status === 'Selesai') success @elseif ($item->status === 'Sedang Dilakukan') warning @elseif ($item->status === 'Dibatalkan') danger @else secondary @endif">
                                        {{ $item->status }}
                                    </span>
                                </div>

                                <ul class="maintenance-meta">
                                    <li><strong>Sungai:</strong> {{ $item->sungai?->nama_sungai ?? '-' }}</li>
                                    <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </li>
                                    <li><strong>Petugas:</strong> {{ $item->user?->nama_lengkap ?? 'Admin' }}</li>
                                </ul>

                                @if ($item->deskripsi)
                                    <p class="maintenance-description">{{ Str::limit($item->deskripsi, 120) }}</p>
                                @endif

                                @if ($item->catatan)
                                    <p class="maintenance-note"><strong>Catatan:</strong> {{ Str::limit($item->catatan, 90) }}</p>
                                @endif
                            </div>

                            <div class="maintenance-card-footer">
                                <a href="{{ route('pemeliharaan.edit', $item->pemeliharaan_id) }}"
                                    class="btn maintenance-action-btn primary">Edit</a>
                                <form action="{{ route('pemeliharaan.destroy', $item->pemeliharaan_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus kegiatan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn maintenance-action-btn danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

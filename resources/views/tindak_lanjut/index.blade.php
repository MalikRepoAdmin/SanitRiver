@extends('layouts.main') 

@section('title', 'Tindak Lanjut Laporan Sungai - SanitRiver')

@section('content')
<div class="container mt-4">
    <h2>Tindak Lanjut Laporan Sungai</h2>
    <!-- <p class="text-muted">Lokasi: {{ $laporanSungai->lokasi ?? $laporanSungai->nama_sungai ?? 'Laporan #'.$laporanSungai->id }}</p> -->
    <p class="text-muted">Laporan ID: #{{ $laporanSungai->laporansungai_id }} | Sungai: {{ $laporanSungai->sungai->nama_sungai ?? 'N/A' }}</p>
    
    {{-- Notifikasi Sukses --}} 
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- FORM CREATE --}}
    <div class="card mb-4">
        <div class="card-header">Tambah Tindak Lanjut</div>
        <div class="card-body">
            <form action="{{ route('tindak-lanjut.store', $laporanSungai -> $laporanSungai_id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Petugas</label>
                    <input type="text" name="petugas" class="form-control @error('petugas') is-invalid @enderror" value="{{ old('petugas') }}">
                    @error('petugas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Deskripsi Tindakan</label>
                    <textarea name="tindakan" class="form-control @error('tindakan') is-invalid @enderror" rows="3">{{ old('tindakan') }}</textarea>
                    @error('tindakan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="pending" @selected(old('status') == 'pending')>Pending</option>
                            <option value="proses" @selected(old('status') == 'proses')>Proses</option>
                            <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal_tindak_lanjut" class="form-control @error('tanggal_tindak_lanjut') is-invalid @enderror" value="{{ old('tanggal_tindak_lanjut') }}">
                        @error('tanggal_tindak_lanjut') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    {{-- TABEL READ --}}
    <div class="card">
        <div class="card-header">Riwayat Tindak Lanjut</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Petugas</th>
                        <th>Tindakan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tindakLanjuts as $tl)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($tl->tanggal_tindak_lanjut)->format('d M Y') }}</td>
                            <td>{{ $tl->petugas }}</td>
                            <td>{{ $tl->tindakan }}</td>
                            <td>
                                {{-- LOGIKA IF UNTUK BADGE STATUS --}}
                                @if($tl->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif($tl->status == 'proses')
                                    <span class="badge bg-warning text-dark">Proses</span>
                                @else
                                    <span class="badge bg-secondary">Pending</span>
                                @endif
                            </td>
                            <td>
                                {{-- FORM UPDATE STATUS --}}
                                <form action="{{ route('tindak-lanjut.update', $tl->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PUT')
                                    <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                        <option value="pending" @selected($tl->status=='pending')>Set Pending</option>
                                        <option value="proses" @selected($tl->status=='proses')>Set Proses</option>
                                        <option value="selesai" @selected($tl->status=='selesai')>Set Selesai</option>
                                    </select>
                                </form>

                                {{-- FORM DELETE --}}
                                <form action="{{ route('tindak-lanjut.destroy', $tl->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data tindak lanjut.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('pemeliharaan.layouts.app')

@section('title', 'Tambah Pemeliharaan')

@section('content')
    <div class="maintenance-page">
        <div class="maintenance-form-shell">
            <div class="maintenance-form-card">
                <div class="maintenance-form-body">
                    <div class="maintenance-section-header">
                        <div>
                            <h3 class="maintenance-section-title">Tambah Kegiatan Pemeliharaan</h3>
                            <p class="maintenance-section-subtitle">Catat kegiatan perawatan sungai yang telah atau akan dilakukan.</p>
                        </div>
                        <a href="{{ route('pemeliharaan.index') }}" class="btn maintenance-secondary-btn">Kembali</a>
                    </div>

                    <form action="{{ route('pemeliharaan.store') }}" method="POST">
                        @csrf

                        <div class="maintenance-form-grid">
                            <div class="maintenance-form-row">
                                <div class="maintenance-field">
                                    <label class="maintenance-label">Nama Sungai</label>
                                    <select name="sungai_id" class="maintenance-select @error('sungai_id') is-invalid @enderror">
                                        <option value="">-- Pilih sungai --</option>
                                        @foreach ($sungais as $sungai)
                                            <option value="{{ $sungai->sungai_id }}" {{ old('sungai_id') == $sungai->sungai_id ? 'selected' : '' }}>
                                                {{ $sungai->nama_sungai }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sungai_id')
                                        <span class="maintenance-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="maintenance-field">
                                    <label class="maintenance-label">Judul Kegiatan</label>
                                    <input type="text" name="judul" value="{{ old('judul') }}" class="maintenance-input @error('judul') is-invalid @enderror" placeholder="Contoh: Pembersihan sampah di bantaran sungai">
                                    @error('judul')
                                        <span class="maintenance-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="maintenance-form-row">
                                <div class="maintenance-field">
                                    <label class="maintenance-label">Jenis Kegiatan</label>
                                    <select name="jenis_kegiatan" class="maintenance-select @error('jenis_kegiatan') is-invalid @enderror">
                                        <option value="">-- Pilih jenis --</option>
                                        @foreach (['Pembersihan', 'Penyisiran Sampah', 'Pengecekan Kualitas Air', 'Penggalian Dan Pembersihan', 'Tebing', 'Perbaikan Saluran', 'Lainnya'] as $jenis)
                                            <option value="{{ $jenis }}" {{ old('jenis_kegiatan') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_kegiatan')
                                        <span class="maintenance-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="maintenance-field">
                                    <label class="maintenance-label">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="maintenance-input @error('tanggal') is-invalid @enderror">
                                    @error('tanggal')
                                        <span class="maintenance-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="maintenance-field full">
                                <label class="maintenance-label">Status</label>
                                <select name="status" class="maintenance-select @error('status') is-invalid @enderror">
                                    <option value="">-- Pilih status --</option>
                                    @foreach (['Direncanakan', 'Sedang Dilakukan', 'Selesai', 'Dibatalkan'] as $status)
                                        <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="maintenance-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="maintenance-field full">
                                <label class="maintenance-label">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="maintenance-textarea @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan detail kegiatan...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <span class="maintenance-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="maintenance-field full">
                                <label class="maintenance-label">Catatan</label>
                                <textarea name="catatan" rows="2" class="maintenance-textarea @error('catatan') is-invalid @enderror" placeholder="Catatan tambahan...">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <span class="maintenance-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="maintenance-footer-actions">
                            <a href="{{ route('pemeliharaan.index') }}" class="btn maintenance-cancel-btn">Batal</a>
                            <button type="submit" class="btn maintenance-submit-btn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

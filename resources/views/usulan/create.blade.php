@extends('components.layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="w-100 bg-white" style="max-width: 650px; padding: 40px 20px;">

        <h3 class="fw-bold mb-5" style="color: #00685F;">Form Usulan Pemasangan Infrastruktur</h3>

        <form action="{{ route('usulan-infrastruktur.store') }}" method="POST">
            @csrf

            <!-- Select Lokasi Sungai dari Database -->
            <div class="mb-4 pb-2">
                <label class="form-label text-muted" style="font-size: 14px;">Pilih Lokasi Sungai:</label>
                <select class="form-select border-0 border-bottom rounded-0 shadow-none px-0" 
                    name="lokasi_usulan" 
                    style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;" 
                    required>
                    <option value="" disabled selected hidden>-- Pilih Sungai --</option>
                    @foreach($sungaiList as $sungai)
                        <option value="{{ $sungai->nama_sungai }} ({{ $sungai->alamat }})" {{ old('lokasi_usulan') == $sungai->nama_sungai . ' (' . $sungai->alamat . ')' ? 'selected' : '' }}>
                            {{ $sungai->nama_sungai }} — {{ $sungai->alamat }}
                        </option>
                    @endforeach
                </select>
                @error('lokasi_usulan')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jenis Infrastruktur -->
            <div class="mb-4 pb-2">
                <select class="form-select border-0 border-bottom rounded-0 shadow-none px-0" 
                    name="jenis_infrastruktur" 
                    style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;" 
                    required>
                    <option value="" disabled selected hidden>-- Pilih Jenis Infrastruktur --</option>
                    <option value="Tempat Sampah Permanen" {{ old('jenis_infrastruktur') == 'Tempat Sampah Permanen' ? 'selected' : '' }}>Tempat Sampah Permanen</option>
                    <option value="Jaring Penangkap Sampah" {{ old('jenis_infrastruktur') == 'Jaring Penangkap Sampah' ? 'selected' : '' }}>Jaring Penangkap Sampah</option>
                    <option value="Papan Peringatan Dilarang Membuang Sampah" {{ old('jenis_infrastruktur') == 'Papan Peringatan Dilarang Membuang Sampah' ? 'selected' : '' }}>Papan Peringatan</option>
                    <option value="Toilet Umum Darurat" {{ old('jenis_infrastruktur') == 'Toilet Umum Darurat' ? 'selected' : '' }}>Toilet Umum Darurat</option>
                </select>
                @error('jenis_infrastruktur')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alasan Kebutuhan -->
            <div class="mb-4 pb-2">
                <textarea class="form-control border-0 border-bottom rounded-0 shadow-none px-0" 
                    name="alasan_kebutuhan" rows="3" placeholder="Alasan Kebutuhan" 
                    style="color: #6b7280; border-bottom: 1.5px solid #9ca3af !important; font-size: 15px; background-color: transparent;" 
                    required>{{ old('alasan_kebutuhan') }}</textarea>
                @error('alasan_kebutuhan')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tingkat Urgensi -->
            <div class="mb-4 pb-2">
                <label class="form-label d-block" style="color: #6b7280; font-size: 14px;">Tingkat Urgensi:</label>
                <div class="d-flex gap-4 mt-2">
                    <div class="form-check">
                        <input class="form-check-input shadow-none" type="radio" name="tingkat_urgensi" id="urgensi_tinggi" value="Tinggi" {{ old('tingkat_urgensi') == 'Tinggi' ? 'checked' : '' }}>
                        <label class="form-check-label" for="urgensi_tinggi" style="color: #6b7280; font-size: 14px;">Tinggi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input shadow-none" type="radio" name="tingkat_urgensi" id="urgensi_sedang" value="Sedang" {{ old('tingkat_urgensi') == 'Sedang' ? 'checked' : '' }}>
                        <label class="form-check-label" for="urgensi_sedang" style="color: #6b7280; font-size: 14px;">Sedang</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input shadow-none" type="radio" name="tingkat_urgensi" id="urgensi_rendah" value="Rendah" {{ old('tingkat_urgensi') == 'Rendah' ? 'checked' : '' }}>
                        <label class="form-check-label" for="urgensi_rendah" style="color: #6b7280; font-size: 14px;">Rendah</label>
                    </div>
                </div>
                @error('tingkat_urgensi')
                    <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn w-100 fw-bold border-0 mt-3"
                style="background-color: #00685F; color: white; padding: 14px; font-size: 15px; border-radius: 8px; transition: opacity 0.2s;"
                onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                SUBMIT
            </button>

        </form>

    </div>
</div>
@endsection
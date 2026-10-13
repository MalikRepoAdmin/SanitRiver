{{-- NAVBAR --}}
<div class="container-fluid mt-3 pb-3">
    <div class="row align-items-center" style="margin-left: 60px; margin-right: 60px;">
        {{-- Kolom Kiri Logo --}}
        <div class="col-md-4">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Foto Logo" style="width: 52px;">
                <div class="lh-1">
                    <h5 class="mb-0 fw-bold" style="color: #00685F;">SanitRiver</h5>
                    <strong style="font-size: 12px;">Sistem Pemantauan dan Pelaporan<br>kondisi Sungai</strong>
                </div>
            </div>
        </div>
        {{-- Kolom Tengah Menu Navigasi --}}
        <div class="col-md-4">
            <div class="d-flex justify-content-center gap-4" id="btn-navbar">
                <a class="btn" href="/beranda" wire:navigate>Beranda</a>
                <a class="btn" href="/laporan-sungai" wire:navigate>Laporan Sungai</a>
                <a class="btn" href="/sungai-map" wire:navigate>Peta Sungai</a>
            </div>
        </div>
        {{-- Kolom Kanan Profil Pengguna --}}
        <div class="col-md-4">
            <div class="d-flex justify-content-end align-items-center gap-2">
                <div
                    style="width: 40px; height: 40px; border-radius: 50%; border: 2px solid #00685F; display: flex; align-items: center; justify-content: center;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00685F"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="lh-2">
                    <small class="d-block text-muted" style="font-size: 0.75rem;">Selamat Datang</small>
                    <strong style="font-size: 14px;">{{ $username }}</strong>
                </div>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    style="cursor: pointer; margin-left: 5px;">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>
        </div>
    </div>
</div>

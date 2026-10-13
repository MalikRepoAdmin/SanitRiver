<div class="sidebar-info">

    {{-- Judul Sungai --}}
    <div class="info-header">
        <h2>Sungai Ciliwung Hilir</h2>
        <p class="info-location">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" 
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
            </svg>
            Jl. MT Haryono No. 14, Cawang, Kramat Jati, Jakarta Timur, DKI Jakarta
        </p>
    </div>

    {{-- Status Sanitasi --}}
    <div class="info-card">
        <div class="info-card-header">
            <span class="info-card-title">
                <span class="icon-box">💧</span> Status Sanitasi & Mutu Air
            </span>
            <span class="info-update">Update: 15 mnt lalu</span>
        </div>
        <div class="info-row">
            <span>Status Sanitasi Sungai</span>
            <span class="badge badge-bersih">Bersih</span>
        </div>
    </div>

    {{-- Tipe Sungai --}}
    <div class="info-card">
        <div class="info-card-header">
            <span class="info-card-title">Tipe Sungai</span>
        </div>
        <div class="info-row">
            <span>Sungai hilir</span>
        </div>
    </div>

    {{-- Dokumentasi --}}
    <div class="info-card">
        <div class="info-card-header">
            <span class="info-card-title">
                <span class="icon-box">🖼️</span> Dokumentasi Sanitasi Sungai Terkini
            </span>
            <span class="info-update">3 Foto</span>
        </div>
        <div class="info-doc">
            <img src="{{ asset('images/beranda-sungai.jpg') }}" alt="Dokumentasi sungai">
            <span class="doc-caption">Bantaran Cawang</span>
        </div>
    </div>

    {{-- Tombol Laporan --}}
    <a href="{{ route('sungai.detail', 1) }}" class="btn-lapor">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <line x1="12" y1="17" x2="12.01" y2="17"></line>
        </svg>
        Laporkan Sanitasi Sungai Ini
    </a>

</div>
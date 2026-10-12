@extends('layouts.main')

@section('title', 'SanitRiver - Beranda')

@section('content')
    {{-- JAGALAH KEBERSIHAN SUNGAI BERSAMA SANITRIVER --}}
    <div class="container-fluid" style="padding-top: 80px; padding-bottom: 60px; background-color: #f5f5f5;">
        <div class="row align-items-center" style="margin-left: 60px; margin-right: 60px;">
            <!-- Kolom Kiri: Teks dan Tombol -->
            <div class="col-6 mb-5 mb-lg-0">
                <div class="d-inline-flex align-items-center px-3 py-2 rounded-pill mb-4" style="background-color: #caf5ef; color: #005049; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;">
                    <div class="me-2 rounded-circle" style="width: 6px; height: 6px; background-color: #005049;"></div>
                        SISTEM INFORMASI DAN PELAPORAN BERBASIS WEBSITE PEMANTAUAN SANITASI SUNGAI
                </div>
                <h1 class="mb-4" style="font-weight: 650; font-size: 3.5rem; line-height: 1.2; letter-spacing: 0.55px;">
                    Jaga Kebersihan Sungai <br>
                    <span style="color: #009489; letter-spacing: 0.55px;">Bersama SanitRiver</span>
                </h1>
                <p class="mb-5" style="font-size: 1.1rem; line-height: 1.6; max-width: 90%;">
                    SanitRiver mengintegrasikan partisipasi masyarakat berbasis geolokasi, data telemetri mutu air terstandar, dan kanal pelaporan langsung menuju Dinas Lingkungan Hidup demi ketahanan hidrologis yang berkelanjutan.
                </p>
                <div class="d-flex align-items-center justify-content-start flex-wrap gap-3" id="btn-beranda">
                    <button class="btn" style="background-color: #016498;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                        Eksplorasi Peta Sungai
                    </button>
                    <button class="btn" style="background-color: #016960;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        Buat Laporan Sungai
                    </button>
                </div>
            </div>
            {{-- Kolom Kanan: Gambar Sungai --}}
            <div class="col-6">
                <img src="{{ asset('images/beranda-sungai.jpg') }}" alt="Sungai" class="img-fluid w-100 rounded-4 shadow-sm" id="beranda-sungai-image" style="object-fit: cover;">
            </div>

        </div>
    </div>

    {{-- CARD STATISTIK --}}
    <div class="container-fluid py-5" style="background-color: #f5f5f5;">
        <div class="row" style="margin-left: 60px; margin-right: 60px;">
            {{-- Card 1: Sungai Terdata --}}
            <div class="col-6 col-lg-3 mb-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #d0efeb; color: #00685F;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 6c.6.5 1.2 1 2.5 1S7 6.5 7.6 6s1.2-1 2.5-1 1.9.5 2.5 1 1.2 1 2.5 1 1.9-.5 2.5-1 1.2-1 2.5-1 1.9.5 2.5 1"></path><path d="M2 12c.6.5 1.2 1 2.5 1S7 12.5 7.6 12s1.2-1 2.5-1 1.9.5 2.5 1 1.2 1 2.5 1 1.9-.5 2.5-1 1.2-1 2.5-1 1.9.5 2.5 1"></path><path d="M2 18c.6.5 1.2 1 2.5 1S7 18.5 7.6 18s1.2-1 2.5-1 1.9.5 2.5 1 1.2 1 2.5 1 1.9-.5 2.5-1 1.2-1 2.5-1 1.9.5 2.5 1"></path></svg>
                        </div>
                        <span class="fw-bold" style="font-size: 0.8rem; color: #00685F;">+18 Data Baru</span>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #1a202c;">142</h2>
                    <h6 class="fw-bold mb-2" style="color: #2d3748;">Sungai Terdata</h6>
                    <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.5;">Mencakup 12 wilayah provinsi prioritas</p>
                </div>
            </div>
            {{-- Card 2: Laporan Terverifikasi --}}
            <div class="col-6 col-lg-3 mb-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #dbeafe; color: #1e40af;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="M9 15l2 2 4-4"></path></svg>
                        </div>
                        <span class="fw-bold" style="font-size: 0.8rem; color: #1e40af;">Tervalidasi</span>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #1a202c;">1.280+</h2>
                    <h6 class="fw-bold mb-2" style="color: #2d3748;">Laporan Terverifikasi</h6>
                    <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.5;">Sains warga dilengkapi koordinat GPS</p>
                </div>
            </div>
            {{-- Card 3: Tindak Lanjut Pemda --}}
            <div class="col-6 col-lg-3 mb-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #bbf7d0; color: #166534;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v6h6"></path><path d="M3 13a9 9 0 1 0 3-7.7L3 8"></path></svg>
                        </div>
                        <span class="fw-bold" style="font-size: 0.8rem; color: #166534;">Respons Cepat</span>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #00685F;">94.6%</h2>
                    <h6 class="fw-bold mb-2" style="color: #2d3748;">Tindak Lanjut Pemda/DLH</h6>
                    <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.5;">Rata-rata intervensi dalam 48 jam</p>
                </div>
            </div>
            {{-- Card 4: Relawan Aktif --}}
            <div class="col-6 col-lg-3 mb-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #e0e7ff; color: #3730a3;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span class="fw-bold" style="font-size: 0.8rem; color: #00685F;">Komunitas Warga</span>
                    </div>
                    <h2 class="fw-bold mb-2" style="font-size: 2.5rem; color: #1a202c;">3.450</h2>
                    <h6 class="fw-bold mb-2" style="color: #2d3748;">Relawan Aktif</h6>
                    <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.5;">Pengawas independen & pemerhati air</p>
                </div>
            </div>
        </div>
    </div>
    {{-- LAPORAN WARGA TERKINI --}}
    <div class="container-fluid py-5 bg-white">
        <!-- Bagian Judul dan Link -->
        <div class="row align-items-end mb-4" style="margin-left: 60px; margin-right: 60px;">
            <div class="col-md-8">
                <h2 class="fw-bold mb-2" style="color: #1a202c; font-size: 2rem;">Laporan Warga Terkini</h2>
                <p class="text-muted mb-0" style="font-size: 1rem;">Data pemantauan langsung dari saksi mata yang telah melalui validasi laporan melalui SanitRiver.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="#" class="text-decoration-none fw-bold" style="color: #00685F;">Lihat Semua Laporan &rarr;</a>
            </div>
        </div>

        <!-- Bagian Grid Card Laporan -->
        <div class="row" style="margin-left: 60px; margin-right: 60px;">
            <!-- Card 1: Bersih (Kab. Bandung) -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ asset('images/laporan-1.jpg') }}" class="w-100" alt="Sungai Citarum" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill d-flex align-items-center gap-2" style="background-color: #d1fae5; color: #047857; font-size: 0.75rem; font-weight: 700;">
                            <span class="rounded-circle" style="width: 6px; height: 6px; background-color: #047857;"></span> Bersih
                        </div>
                        <div class="position-absolute bottom-0 end-0 m-3 px-3 py-1 rounded-pill" style="background-color: rgba(30, 41, 59, 0.85); color: white; font-size: 0.75rem; font-weight: 600;">
                            Kab. Madiun
                        </div>
                    </div>
                    <!-- Isi Card -->
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted" style="font-size: 0.75rem;">DAS Citarum Sektor 1</small>
                            <small class="text-muted fw-bold" style="font-size: 0.75rem;">35 Menit lalu</small>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1a202c; line-height: 1.4;">Aliran Hulu Situ Cisanti Jernih Tanpa Endapan</h5>
                        <p class="text-muted mb-4" style="font-size: 0.85rem; line-height: 1.6;">Pemeriksaan rutin mandiri. Air sangat bening, ikan endemik tampak aktif, tidak terdeteksi aroma limbah...</p>
                        <div class="mt-auto border-top pt-3">
                            <a href="#" class="text-decoration-none fw-bold" style="color: #00685F; font-size: 0.9rem;">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Card 2 Cukup Bersih (Kota Surabaya)  --}}
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ asset('images/laporan-2.jpg') }}" class="w-100" alt="Kali Mas" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill d-flex align-items-center gap-2" style="background-color: #ffedd5; color: #c2410c; font-size: 0.75rem; font-weight: 700;">
                            <span class="rounded-circle" style="width: 6px; height: 6px; background-color: #c2410c;"></span> Cukup Bersih
                        </div>
                        <div class="position-absolute bottom-0 end-0 m-3 px-3 py-1 rounded-pill" style="background-color: rgba(30, 41, 59, 0.85); color: white; font-size: 0.75rem; font-weight: 600;">
                            Kota Surabaya
                        </div>
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted" style="font-size: 0.75rem;">DAS Kali Mas Wonokromo</small>
                            <small class="text-muted fw-bold" style="font-size: 0.75rem;">2 Jam lalu</small>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1a202c; line-height: 1.4;">Sedimentasi Lumpur Meningkat Usai Hujan Deras</h5>
                        <p class="text-muted mb-4" style="font-size: 0.85rem; line-height: 1.6;">Kekeruhan visual berwarna cokelat muda akibat limpasan air hujan dari bagian hulu. Aliran lancar, pintu</p>
                        <div class="mt-auto border-top pt-3">
                            <a href="#" class="text-decoration-none fw-bold" style="color: #00685F; font-size: 0.9rem;">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Card 3 Tercemar (Bekasi Timur) --}}
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ asset('images/laporan-3.jpg') }}" class="w-100" alt="Kali Bekasi" style="height: 220px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill d-flex align-items-center gap-2" style="background-color: #ffe4e6; color: #be123c; font-size: 0.75rem; font-weight: 700;">
                            <span class="rounded-circle" style="width: 6px; height: 6px; background-color: #be123c;"></span> Tercemar
                        </div>
                        <div class="position-absolute bottom-0 end-0 m-3 px-3 py-1 rounded-pill" style="background-color: rgba(30, 41, 59, 0.85); color: white; font-size: 0.75rem; font-weight: 600;">
                            Bekasi Timur
                        </div>
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted" style="font-size: 0.75rem;">DAS Kali Bekasi Hulu</small>
                            <small class="text-muted fw-bold" style="font-size: 0.75rem;">4 Jam lalu</small>
                        </div>
                        <h5 class="fw-bold mb-3" style="color: #1a202c; line-height: 1.4;">Busa Kimia Pekat & Bau Menyengat di Bendung</h5>
                        <p class="text-muted mb-4" style="font-size: 0.85rem; line-height: 1.6;">Ditemukan tumpahan busa putih membentang 150 meter. Sudah dieskalasi otomatis menuju Unit...</p>
                        <div class="mt-auto border-top pt-3">
                            <a href="#" class="text-decoration-none fw-bold" style="color: #00685F; font-size: 0.9rem;">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
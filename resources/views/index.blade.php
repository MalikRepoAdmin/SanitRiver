<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SanitRiver - Beranda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                    <button class="btn">Beranda</button>
                    <button class="btn">Laporan Sungai</button>
                    <button class="btn">Peta Sungai</button>
                </div>
            </div>
            {{-- Kolom Kanan Profil Pengguna --}}
            <div class="col-md-4">
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <div style="width: 40px; height: 40px; border-radius: 50%; border: 2px solid #00685F; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00685F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <div class="lh-2">
                        <small class="d-block text-muted" style="font-size: 0.75rem;">Selamat Datang</small>
                        <strong style="font-size: 14px;">User123456</strong>
                    </div>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer; margin-left: 5px;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </div>
    </div>

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
                            Kab. Bandung
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

    {{-- FOOTER --}}
    <div class="container-fluid border-top pt-5 pb-3 mt-5 bg-white" style="box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.15);">        
        <div class="row" style="margin-left: 60px; margin-right: 60px;">
            {{-- Kolom 1: Logo & Deskripsi --}}
            <div class="col-lg-5 col-md-12 mb-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo SanitRiver" style="width: 40px; border-radius: 8px;">
                    <h5 class="mb-0 fw-bold" style="color: #00685F; font-size: 1.2rem;">SanitRiver</h5>
                </div>
                <p class="text-muted pe-lg-5" style="font-size: 0.85rem; line-height: 1.6; color: #4a5568 !important;">
                    Sistem pemantauan kualitas air dan pelaporan pencemaran sungai partisipatif berbasis warga untuk ketahanan hidrologis yang berkelanjutan di seluruh Indonesia.
                </p>
            </div>
            {{-- Kolom 2 Navigasi Cepat --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold mb-3" style="color: #00685F; font-size: 1.05rem;">Navigasi Cepat</h6>
                <ul class="list-unstyled" style="font-size: 0.85rem; line-height: 2.2;">
                    <li><a href="#" class="text-decoration-none text-dark">Beranda</a></li>
                    <li><a href="#" class="text-decoration-none text-dark">Laporan Sungai</a></li>
                    <li><a href="#" class="text-decoration-none text-dark">Peta Sungai</a></li>
                    <li><a href="#" class="text-decoration-none text-dark">Buat Laporan Sungai</a></li>
                </ul>
            </div>
            {{-- Kolom 3 Hubungi Kami & Sosial Media --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <h6 class="fw-bold mb-3" style="color: #00685F; font-size: 1.05rem;">Hubungi kami</h6>
                {{-- Info Kontak --}}
                <div class="d-flex flex-column gap-3 mb-4" style="font-size: 0.85rem;">
                    {{-- WhatsApp --}}
                    <div class="d-flex align-items-center gap-2 text-dark">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span class="fw-medium">+62 895 444 333 222</span>
                    </div>
                    {{-- Email --}}
                    <div class="d-flex align-items-center gap-2 text-dark">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span class="fw-medium">SanitRiver@email.com</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    {{-- Instagram --}}
                    <a href="#" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: white; text-decoration: none;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    {{-- Facebook --}}
                    <a href="#" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background-color: #1877F2; color: white; text-decoration: none;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    {{-- X (Twitter) --}}
                    <a href="#" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 32px; height: 32px; background-color: #000000; color: white; text-decoration: none;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="row border-top mt-4 pt-3" style="margin-left: 60px; margin-right: 60px;">
            <div class="col-12 text-center">
                <p class="mb-0 text-muted" style="font-size: 0.8rem; font-weight: 500;">
                    &copy; 2026 SanitRiver. Hak cipta dilindungi undang-undang.
                </p>
            </div>
        </div>    
    </div>
</body>
</html>
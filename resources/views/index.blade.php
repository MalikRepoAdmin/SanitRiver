<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- NAVBAR --}}
    <div class="container-fluid mt-3 pb-3 border-bottom">
        <div class="row align-items-center">

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
    <div class="container-fluid" style="padding-top: 80px;">
        <div class="row align-items-center">

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
                <div class="d-flex flex-wrap gap-3">
                    <button class="btn btn-navbar-custom d-flex align-items-center gap-2 px-4 py-2" style="font-weight: 500;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                        Eksplorasi Peta Sungai
                    </button>
                    <button class="btn btn-navbar-custom d-flex align-items-center gap-2 px-4 py-2" style="font-weight: 500;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        Buat Laporan Sungai
                    </button>
                </div>
            </div>
            
            <!-- Kolom Kanan: Gambar Sungai -->
            <div class="col-6">
                <img src="{{ asset('images/beranda-sungai.jpg') }}" alt="Sungai" class="rounded-4 shadow-sm" id="beranda-sungai-image">
            </div>

        </div>
    </div>

</body>
</html>
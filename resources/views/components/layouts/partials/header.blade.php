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
                <a class="btn" href="/sungai/map">Peta Sungai</a>
            </div>
        </div>

        {{-- Kolom Kanan Profil Pengguna --}}
        <div class="col-md-4">
            <div class="d-flex justify-content-end align-items-center">
                
                <!-- Wrapper Dropdown -->
                <div class="dropdown">
                    <!-- Pemicu Dropdown (Klik pada area ini) -->
                    <div class="d-flex align-items-center gap-2" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                        
                        <!-- Avatar -->
                        <div style="width: 40px; height: 40px; border-radius: 50%; border: 2px solid #00685F; display: flex; align-items: center; justify-content: center;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00685F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        
                        <!-- Teks Nama -->
                        <div class="lh-2">
                            <small class="d-block text-muted" style="font-size: 0.75rem;">Selamat Datang</small>
                            <strong style="font-size: 14px;">{{ Auth::user()->name ?? 'Guest' }}</strong>
                        </div>
                        
                        <!-- Ikon Panah Bawah -->
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px;">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>

                    <!-- Isi Menu Dropdown -->
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                        {{-- Jika pengguna BELUM login (Guest) --}}
                        @guest
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus me-2"></i>Register
                                </a>
                            </li>
                        @endguest

                        {{-- Jika pengguna SUDAH login (Auth) --}}
                        @auth
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person me-2"></i>Profil Saya
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <!-- Logout biasanya memerlukan metode POST demi keamanan -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

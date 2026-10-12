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
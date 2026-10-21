<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<footer class="site-footer">
    <div class="site-footer-inner">

        <div class="footer-column">
            <a href="{{ route('beranda') }}" class="footer-brand">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo SanitRiver" class="footer-logo">
                <span class="footer-brand-name">SanitRiver</span>
            </a>
            <p class="footer-description">
                Sistem pemantauan kualitas air dan pelaporan pencemaran sungai partisipatif berbasis warga
                untuk ketahanan hidrologis yang berkelanjutan di seluruh Indonesia.
            </p>
        </div>

        <div class="footer-column">
            <h4 class="footer-title">Navigasi Cepat</h4>
            <ul class="footer-links">
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li><a href="{{ route('sungai.laporan') }}">Laporan Sungai</a></li>
                <li><a href="{{ route('sungai.map') }}">Peta Sungai</a></li>
                
                <!-- UTS -->
                <li><a href="{{ route('database.metric') }}" class="{{ Route::is('database.metric') ? 'fw-bold text-primary' : '' }}">📊 Metrik Database (UTS)</a></li>
        </ul>
            
            </ul>
        </div>

        <div class="footer-column">
            <h4 class="footer-title">Hubungi kami</h4>
            <ul class="footer-contacts">
                <li><i class="bi bi-whatsapp"></i> +62 895 444 333 222</li>
                <li><i class="bi bi-envelope-fill"></i> SanitRiver@email.com</li>
            </ul>
            <div class="footer-socials">
                <a href="#" class="social-link social-instagram" aria-label="Instagram"><i
                        class="bi bi-instagram"></i></a>
                <a href="#" class="social-link social-facebook" aria-label="Facebook"><i
                        class="bi bi-facebook"></i></a>
                <a href="#" class="social-link social-x" aria-label="X"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; {{ date('Y') }} Nama Brand. Hak cipta dilindungi undang-undang.
    </div>
</footer>

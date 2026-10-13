<header class="site-header">
    <div class="site-header-inner">

        <a href="{{ route('beranda') }}" class="brand">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo SanitRiver" class="brand-logo">
            <div class="brand-text">
                <span class="brand-name">SanitRiver</span>
                <span class="brand-tagline">Sistem Pemantauan dan Pelaporan<br>kondisi Sungai</span>
            </div>
        </a>

        <nav class="main-nav">
            <a href="{{ route('beranda') }}"
                class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Beranda</a>
            <a href="{{ route('sungai.laporan') }}"
                class="nav-link {{ request()->routeIs('reports.*') ? 'nav-link-active' : '' }}">Laporan Sungai</a>
            <a href="{{ route('sungai.map') }}"
                class="nav-link {{ request()->routeIs('map.*') ? 'nav-link-active' : '' }}">Peta Sungai</a>
        </nav>

        <div class="user-menu" id="user-menu">
            <button type="button" class="user-menu-button" id="user-menu-button" aria-haspopup="true"
                aria-expanded="false">
                <i class="bi bi-person-circle user-avatar"></i>
                <span class="user-info">
                    <span class="user-greeting">Selamat Datang</span>
                    <span class="user-name">{{ auth()->user()->username ?? 'Guest' }}</span>
                </span>
                <i class="bi bi-caret-down-fill user-caret"></i>
            </button>

            <div class="user-dropdown" id="user-dropdown">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-item-button">
                        <i class="bi bi-box-arrow-right"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>

    </div>
</header>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk | SanitRiver</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="login-card">
        <header class="brand">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo SanitRiver">
            <h1>Login Akun SanitRiver</h1>
        </header>

        @if (session('status'))
            <p class="alert" role="status">{{ session('status') }}</p>
        @endif

        @if ($errors->any() && !$errors->has('login') && !$errors->has('password'))
            <div class="alert" role="alert">Periksa kembali data yang Anda masukkan.</div>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <div class="field">
                <label for="login">Username atau Email</label>
                <div class="input-wrap">
                    <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                        <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                    </svg>
                    <input
                        id="login"
                        name="login"
                        type="text"
                        value="{{ old('login') }}"
                        placeholder="nama_pengguna atau email@domain.com"
                        autocomplete="username"
                        required
                        autofocus
                        @if ($errors->has('login')) aria-invalid="true" aria-describedby="login-error" @endif
                    >
                </div>
                @error('login')
                    <p class="field-error" id="login-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="password">Kata Sandi</label>
                <div class="input-wrap">
                    <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"></path>
                    </svg>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Masukkan kata sandi"
                        autocomplete="current-password"
                        required
                        @if ($errors->has('password')) aria-invalid="true" aria-describedby="password-error" @endif
                    >
                    <button class="toggle-password" type="button" aria-label="Tampilkan kata sandi" aria-pressed="false" data-password-toggle>
                        <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 12s3.6-6 10-6 10 6 10 6-3.6 6-10 6S2 12 2 12Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="field-error" id="password-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <button class="submit-button" type="submit">
                Masuk Sekarang
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"></path>
                </svg>
            </button>
        </form>

        <p class="register-prompt">
            Belum memiliki akun?<br>
            <a class="register-link" href="{{ route('register') }}">
                Daftar Akun Baru
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
            </a>
        </p>
    </main>

    <script>
        const passwordInput = document.querySelector('#password');
        const passwordToggle = document.querySelector('[data-password-toggle]');

        passwordToggle.addEventListener('click', () => {
            const isVisible = passwordInput.type === 'text';
            passwordInput.type = isVisible ? 'password' : 'text';
            passwordToggle.setAttribute('aria-pressed', String(!isVisible));
            passwordToggle.setAttribute('aria-label', isVisible ? 'Tampilkan kata sandi' : 'Sembunyikan kata sandi');
        });
    </script>
</body>
</html>
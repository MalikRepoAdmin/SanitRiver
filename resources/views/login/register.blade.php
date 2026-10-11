<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Akun | SanitRiver</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <main>
        <header>
            <img class="brand-logo" src="{{ asset('images/logo.jpeg') }}" alt="Logo SanitRiver">
            <h1>Daftar Akun SanitRiver</h1>
        </header>

        @if ($errors->any())
            <div class="alert" role="alert">Periksa kembali data yang Anda masukkan.</div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="field name-field">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                            <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                        </svg>
                        <input id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama lengkap Anda" autocomplete="name" maxlength="255" required @if ($errors->has('nama_lengkap')) aria-invalid="true" aria-describedby="nama-lengkap-error" @endif>
                    </div>
                    @error('nama_lengkap')<p class="error" id="nama-lengkap-error">{{ $message }}</p>@enderror
                </div>

                <div class="field work-field">
                    <label for="pekerjaan">Pekerjaan</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                            <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                        </svg>
                        <input id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Profesi Anda" autocomplete="organization-title" maxlength="255" @if ($errors->has('pekerjaan')) aria-invalid="true" aria-describedby="pekerjaan-error" @endif>
                    </div>
                    @error('pekerjaan')<p class="error" id="pekerjaan-error">{{ $message }}</p>@enderror
                </div>

                <div class="field username-field">
                    <label for="username">Username</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                            <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                        </svg>
                        <input id="username" name="username" value="{{ old('username') }}" placeholder="Username pengguna" autocomplete="username" maxlength="255" required @if ($errors->has('username')) aria-invalid="true" aria-describedby="username-error" @endif>
                    </div>
                    @error('username')<p class="error" id="username-error">{{ $message }}</p>@enderror
                </div>

                <div class="field domisili-field">
                    <label for="domisili">Domisili</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                            <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                        </svg>
                        <input id="domisili" name="domisili" value="{{ old('domisili') }}" placeholder="Domisili atau alamat Anda saat ini" autocomplete="address-level2" @if ($errors->has('domisili')) aria-invalid="true" aria-describedby="domisili-error" @endif>
                    </div>
                    @error('domisili')<p class="error" id="domisili-error">{{ $message }}</p>@enderror
                </div>

                <div class="field tgl-lahir-field">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="16" rx="2"></rect>
                            <path d="M16 3v4M8 3v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 17h.01M12 17h.01"></path>
                        </svg>
                        <input id="tgl_lahir" name="tgl_lahir" type="date" value="{{ old('tgl_lahir') }}" autocomplete="bday" @if ($errors->has('tgl_lahir')) aria-invalid="true" aria-describedby="tgl-lahir-error" @endif>
                    </div>
                    @error('tgl_lahir')<p class="error" id="tgl-lahir-error">{{ $message }}</p>@enderror
                </div>

                <div class="field email-field">
                    <label for="email">Email</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                            <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                        </svg>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama_pengguna atau email@domain.com" autocomplete="email" maxlength="255" required @if ($errors->has('email')) aria-invalid="true" aria-describedby="email-error" @endif>
                    </div>
                    @error('email')<p class="error" id="email-error">{{ $message }}</p>@enderror
                </div>

                <div class="field bio-field">
                    <label for="bio">Bio Pengguna</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="6" width="16" height="14" rx="2"></rect>
                            <path d="M9 6V4h6v2M8 11h.01M12 11h4M8 15h.01M12 15h4"></path>
                        </svg>
                        <textarea id="bio" name="bio" placeholder="Tentang diri Anda" @if ($errors->has('bio')) aria-invalid="true" aria-describedby="bio-error" @endif>{{ old('bio') }}</textarea>
                    </div>
                    @error('bio')<p class="error" id="bio-error">{{ $message }}</p>@enderror
                </div>

                <div class="field password-field">
                    <label for="password">Kata Sandi</label>
                    <div class="input-wrap">
                        <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                            <path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"></path>
                        </svg>
                        <input id="password" name="password" type="password" placeholder="Minimal 6 karakter" autocomplete="new-password" required @if ($errors->has('password')) aria-invalid="true" aria-describedby="password-error" @endif>
                        <button class="toggle-password" type="button" aria-label="Tampilkan kata sandi" aria-pressed="false" data-password-toggle="password">
                            <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-6 10-6 10 6 10 6-3.6 6-10 6S2 12 2 12Z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('password')<p class="error" id="password-error">{{ $message }}</p>@enderror
                    <div class="confirmation-field">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="input-wrap">
                            <svg class="input-icon" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="5" y="10" width="14" height="11" rx="2"></rect>
                                <path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"></path>
                            </svg>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi kata sandi" autocomplete="new-password" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="submit" type="submit">
                    Daftar Sekarang
                    <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"></path>
                    </svg>
                </button>
            </div>
        </form>

        <p class="footer">
            Sudah memiliki akun?<br>
            <a href="{{ route('login') }}">
                Login dengan Akun
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
            </a>
        </p>
    </main>

    <script>
        document.querySelectorAll('[data-password-toggle]').forEach((toggle) => {
            toggle.addEventListener('click', () => {
                const input = document.getElementById(toggle.dataset.passwordToggle);
                const isVisible = input.type === 'text';
                input.type = isVisible ? 'password' : 'text';
                toggle.setAttribute('aria-pressed', String(!isVisible));
                toggle.setAttribute('aria-label', isVisible ? 'Tampilkan kata sandi' : 'Sembunyikan kata sandi');
            });
        });
    </script>
</body>
</html>

@extends('components.layouts.auth')

@section('title', 'SanitRiver - Daftar Akun')

@section('content')
<div class="container min-vh-100 d-flex justify-content-center align-items-center px-3 py-5">
    <div class="card border-0 w-100" style="max-width: 850px; background-color: #ffffff; border-radius: 20px; box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.1); padding: 40px 35px;">
        <div class="d-flex flex-column align-items-center mb-4 pb-2">
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/logo.jpeg') }}" alt="SanitRiver Logo" style="width: 57px; height: 57px;">
            </div>
            <h4 class="fw-bold m-0" style="color: #111827; letter-spacing: -0.5px;">Daftar Akun SanitRiver</h4>
        </div>

        <form action="#" method="POST">
            @csrf
            <div class="row gx-4">
                <div class="col-6">
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Nama Lengkap</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-regular fa-id-badge" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="text" class="form-control border-0 shadow-none bg-transparent" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="nama_pengguna atau email@domain.com" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                        </div>
                        @error('nama_lengkap')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Username</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-regular fa-user" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="text" class="form-control border-0 shadow-none bg-transparent" name="username" value="{{ old('username') }}" placeholder="Username pengguna" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                        </div>

                        @error('username')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Email</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-regular fa-envelope" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="email" class="form-control border-0 shadow-none bg-transparent" name="email" value="{{ old('email') }}" placeholder="nama_pengguna atau email@domain.com" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                        </div>
                        @error('email')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Kata Sandi</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-solid fa-lock" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="password" class="form-control border-0 shadow-none bg-transparent" name="password" value="{{ old('password') }}" placeholder="••••••••" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                            <i class="fa-regular fa-eye" style="color: #8c94a3; font-size: 16px; cursor: pointer;"></i>
                        </div>
                        @error('password')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Konfirmasi Kata Sandi</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-solid fa-lock" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="password" class="form-control border-0 shadow-none bg-transparent" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="••••••••" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                            <i class="fa-regular fa-eye" style="color: #8c94a3; font-size: 16px; cursor: pointer;"></i>
                        </div>
                        @error('password_confirmation')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Pekerjaan</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-solid fa-briefcase" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="text" class="form-control border-0 shadow-none bg-transparent" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Profesi pengguna" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                        </div>
                        @error('pekerjaan')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Domisili</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                            <i class="fa-solid fa-location-dot" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="text" class="form-control border-0 shadow-none bg-transparent" name="domisili" value="{{ old('domisili') }}" placeholder="Domisili atau alamat pengguna saat ini" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                        </div>

                        @error('domisili')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Bio Pengguna</label>
                        <!-- Menggunakan align-items-start agar ikon tetap berada di atas untuk textarea -->
                        <div class="d-flex align-items-start w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 12px 16px;">
                            <i class="fa-regular fa-address-card mt-2" style="color: #8c94a3; font-size: 18px;"></i>
                            <textarea class="form-control border-0 shadow-none bg-transparent" name="bio" value="{{ old('bio') }}" placeholder="tentang pengguna" rows="4" style="font-size: 14px; padding: 4px 10px; color: #111827; resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Tanggal Lahir</label>
                        <div class="d-flex align-items-center w-100" style="background-color: #f3f5f9; border-radius: 10px; padding: 12px 16px;">
                            <i class="fa-regular fa-calendar" style="color: #8c94a3; font-size: 18px;"></i>
                            <input type="date" class="form-control border-0 shadow-none bg-transparent" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required style="font-size: 14px; padding: 0px 10px; color: #111827;">
                        </div>
                        @error('tgl_lahir')
                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center mt-3">
                <button type="submit" class="btn fw-semibold d-flex justify-content-center align-items-center gap-2 border-0" style="background-color: #036b5c; color: white; border-radius: 10px; padding: 14px; font-size: 15px; width: 100%; max-width: 320px; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    Daftar Sekarang
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
                <div class="text-center mt-4 pt-1">
                    <p class="mb-3" style="color: #6b7280; font-size: 13.5px;">Sudah memiliki akun?</p>
                    <a href="{{ route('login') }}" class="text-decoration-none fw-bold d-inline-flex align-items-center gap-1" style="color: #036b5c; font-size: 14px;">
                        Login dengan Akun <i class="fa-solid fa-arrow-right" style="font-size: 12px;"></i>
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
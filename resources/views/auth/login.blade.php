@extends('layouts.auth')

@section('title', 'SanitRiver - Login')

@section('content')

    <div class="container min-vh-100 d-flex justify-content-center align-items-center px-3">
        <div class="card border-0 w-100"
            style="max-width: 460px; background-color: #ffffff; border-radius: 20px; box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.1); padding: 40px 35px;">
            <div class="d-flex flex-column align-items-center mb-4 pb-2">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="SanitRiver Logo" style="width: 57px; height: 57px;">
                </div>
                <h4 class="fw-bold m-0" style="color: #111827; letter-spacing: -0.5px;">Login Akun SanitRiver</h4>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Username atau
                        Email</label>
                    <div class="d-flex align-items-center w-100"
                        style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                        <i class="fa-regular fa-id-badge" style="color: #8c94a3; font-size: 18px;"></i>
                        <input type="text" class="form-control border-0 shadow-none bg-transparent" name="username"
                            placeholder="nama_pengguna atau email@domain.com"
                            style="font-size: 14px; padding: 12px 10px; color: #111827;">
                    </div>
                </div>
                <div class="mb-4 pb-2">
                    <label class="form-label fw-semibold" style="font-size: 13px; color: #374151;">Kata Sandi</label>
                    <div class="d-flex align-items-center w-100"
                        style="background-color: #f3f5f9; border-radius: 10px; padding: 4px 16px;">
                        <i class="fa-solid fa-lock" style="color: #8c94a3; font-size: 18px;"></i>
                        <input type="password" class="form-control border-0 shadow-none bg-transparent" name="password"
                            placeholder="••••••••" style="font-size: 14px; padding: 12px 10px; color: #111827;">
                        <i class="fa-regular fa-eye" style="color: #8c94a3; font-size: 16px; cursor: pointer;"></i>
                    </div>
                </div>
                <button type="submit"
                    class="btn w-100 fw-semibold d-flex justify-content-center align-items-center gap-2 border-0"
                    style="background-color: #036b5c; color: white; border-radius: 10px; padding: 14px; font-size: 15px; transition: opacity 0.2s;"
                    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    Masuk Sekarang
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </form>

            <div class="text-center mt-4 pt-1">
                <p class="mb-3" style="color: #6b7280; font-size: 13.5px;">Belum memiliki akun?</p>
                <a href="{{ route('register') }}"
                    class="text-decoration-none fw-bold d-inline-flex align-items-center gap-1"
                    style="color: #036b5c; font-size: 14px;">
                    Daftar Akun Baru <i class="fa-solid fa-arrow-right" style="font-size: 12px;"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

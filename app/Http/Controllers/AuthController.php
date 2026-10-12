<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show register page
     */
    public function showRegisterUser()
    {
        return view('auth.register');
    }

    /**
     * Show register page (Admin)
     */
    public function showRegisterAdmin()
    {
        return view('auth.register');
    }

    /**
     * Process Register
     */
    public function registerUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users', // email must be unique, 'users' is the table name
            'username' => 'required|max:255|unique:admins',

            // 'confirmed' option is required so user can confirm their password to ensure they remember their password
            // TODO: 'confirmed' option needs 'password_confirmation' on frontend. for example <input type="password" name="password_confirmation">
            'password' => 'required|min:6|confirmed', 
            'nama_lengkap' => 'required|max:255',
            'tgl_lahir' => 'required',

            'bio' => 'sometimes|nullable',
            'pekerjaan' => 'sometimes|nullable|max:255',
            'domisili' => 'sometimes|nullable',
        ], [
            // Error response
            'email.unique' => 'Email ini sudah terdaftar, silahkan gunakan email lain.',
            'username.unique' => 'Username ini sudah terdaftar, silahkan gunakan username lain',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'required' => 'Kolom ini wajib diisi dan tidak boleh kosong.',
            'nama_lengkap.max:255' => 'Nama lengkap Maksimal 255 karakter',
            'pekerjaan.max:255' => 'Pekerjaan Maksimal 255 karakter',
        ]);

        // Store  the user to database
        $user = User::create([
            // Mandatory
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,

            // Optional
            'bio' => $request->whenFilled('bio', fn($value) => $value),
            'pekerjaan' => $request->whenFilled('pekerjaan', fn($value) => $value),
            'domisili' => $request->whenFilled('domisili', fn($value) => $value),
        ]);

        // Automatically call login method after successfully register
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('beranda'));
    }

    /**
     * Process Register (Admin)
     */
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins', // email must be unique, 'admins' is the table name
            'username' => 'required|max:255|unique:admins',

            // 'confirmed' option is required so admin can confirm their password to ensure they remember their password
            // TODO: 'confirmed' option needs 'password_confirmation' on frontend. for example <input type="password" name="password_confirmation">
            'password' => 'required|min:6|confirmed', 
        ], [
            // Error response
            'email.unique' => 'Email ini sudah terdaftar, silakan gunakan email lain.',
            'username.unique' => 'Username ini sudah terdaftar, silahkan gunakan username lain',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'required' => 'Kolom ini wajib diisi dan tidak boleh kosong.',
            'max:255' => 'Maksimal 255 karakter',
        ]);

        // Store  the admin to database
        $admin = Admin::create([
            // Mandatory
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // Automatically call login method after successfully register
        Auth::login($admin);
        $request->session()->regenerate();

        return redirect()->intended(route('beranda'));
    }

    /**
     * Show login page
     */
    public function showLoginUser()
    {
        return view('auth.login');
    }

    /**
     * Show login page (Admin)
     */
    public function showLoginAdmin()
    {
        return view('auth.login');
    }

    /**
     * Process Login
     */
    public function loginUser(Request $request)
    {
        // Validation
        // NOTE: Frontend MUST sends 'login' field, not email nor username
        $credentials = $request->validate([
            'login' => 'required|string', // Handle either email or username
            'password' => 'required',
        ]);

        // Determine login type, either email or username
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $authCredentials = [
            $loginType => $credentials['login'],
            'password' => $credentials['password'],
        ];

        // Laravel automatically check the email and password
        if (Auth::attempt($authCredentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('beranda')); 
        } 
        
        return back()->withErrors([
            'login' => 'Email, Username, atau password salah.',
        ])->onlyInput('login');
        
    }

    /**
     * Process Login (Admin)
     */
    public function loginAdmin(Request $request)
    {
        // Validation
        // NOTE: Frontend MUST sends 'login' field, not email nor username
        $credentials = $request->validate([
            'login' => 'required|string', // Handle either email or username
            'password' => 'required',
        ]);

        // Determine login type, either email or username
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $authCredentials = [
            $loginType => $credentials['login'],
            'password' => $credentials['password'],
        ];

        // Laravel automatically check the email and password
        if (Auth::guard('admins')->attempt($authCredentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('beranda')); 
        } 
        
        return back()->withErrors([
            'login' => 'Email, Username, atau password salah.',
        ])->onlyInput('login');
        
    }

    /**
     * Process Logout
     */
    public function logoutUser(Request $request)
    {
        Auth::logout();

        // destroy session
        $request->session()->invalidate();

        // regenerate token to avoid CSRF attack
        $request->session()->regenerateToken();

        // TODO: define the redirect route according to frontend inside views/
        return redirect('/login')->with('status', 'Anda telah berhasil Logout.');
    }

    /**
     * Process Logout (Admin)
     */
    public function logoutAdmin(Request $request)
    {
        Auth::guard('admins')->logout();

        // destroy session
        $request->session()->invalidate();

        // regenerate token to avoid CSRF attack
        $request->session()->regenerateToken();

        // TODO: define the redirect route according to frontend inside views/
        return redirect('/login')->with('status', 'Anda telah berhasil Logout.');
    }
}

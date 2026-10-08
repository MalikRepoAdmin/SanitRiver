<?php

use App\Http\Controllers\Api\SungaiApiController;
use App\Http\Controllers\SungaiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('welcome');
})->name('beranda');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/user/{user_id}', function ($user_id) {
    return "User profile {$user_id}";
})->name('user.profile');

Route::get('/admin/{admin_id}', function ($admin_id) {
    return "Admin profile {$admin_id}";
})->name('admin.profile');

Route::resource('users', UserController::class);


/**
 * Sungai Map Routes
 */
// Route to display Blade page where map placed
Route::get('/user-dashboard', [SungaiController::class, 'index'])->name('user.dashboard');

// Special route for AJAX to get Bounding Box data (GeoJSON)
Route::get('/api/sungai-bbox', [SungaiApiController::class, 'getWaterways'])->name('api.sungai.bbox');

// Rute halaman detail saat popup sungai diklik (Opsional, untuk masa depan)
Route::get('/sungai/{id}', [SungaiController::class, 'show'])->name('sungai.show');

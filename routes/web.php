<?php

use App\Http\Controllers\Api\SungaiApiController;
use App\Http\Controllers\LaporanSungaiController;
use App\Http\Controllers\SungaiController;
use App\Http\Controllers\UserController;
use App\Livewire\CreateLaporanLivewire;
use App\Livewire\DashboardLivewire;
use App\Livewire\SungaiMapLivewire;
use Illuminate\Support\Facades\Route;


/**
 * Livewire Views Routes
 */
// Auth Mandatory
Route::middleware(['auth'])->group(function () {
    Route::get('/create-laporan', CreateLaporanLivewire::class)->name('sungai.laporan.create');
});

// Auth not Mandatory
Route::get('/', function(){
    return view('welcome');
});
Route::get('/beranda', DashboardLivewire::class)->name('beranda');
Route::get('/sungai-map', SungaiMapLivewire::class)->name('sungai.map');
Route::get('/laporan-sungai', SungaiMapLivewire::class)->name('sungai.laporan');


/**
 * Sungai Map Routes
 */
// Route to display Blade page where map placed
Route::get('/user-dashboard', [SungaiController::class, 'index'])->name('user.dashboard');

// Rute halaman detail saat popup sungai diklik (Opsional)
Route::get('/sungai/{id}', [SungaiController::class, 'show'])->name('sungai.show');

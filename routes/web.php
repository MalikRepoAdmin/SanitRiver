    <?php

    use App\Http\Controllers\Api\SungaiApiController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\LaporanSungaiController;
    use App\Http\Controllers\SungaiController;
    use App\Http\Controllers\UserController;
    use App\Livewire\CreateLaporanLivewire;
    use App\Livewire\LaporanSungaiLivewire;
    use App\Livewire\DashboardLivewire;
    use Illuminate\Support\Facades\Route;

/**
 * Auth Routes
 */
// Route untuk pengunjung yang BELUM login (Guest)

// Tampilan Form
Route::get('/login', [AuthController::class, 'showLoginUser'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterUser'])->name('register');

// Proses Form (Submit)
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.submit');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.submit');


// Route untuk pengguna yang SUDAH login (Auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout');
});

/**
 * Livewire Views Routes
 */
// // Auth Mandatory
// Route::middleware(['auth'])->group(function () {
//     Route::get('/create-laporan', CreateLaporanLivewire::class)->name('sungai.laporan.create');
// });

// Auth not Mandatory
Route::get('/sungai/map', function(){
    return view('map.map');
});
Route::get('/', DashboardLivewire::class)->name('beranda');
Route::get('/laporan-sungai', LaporanSungaiLivewire::class)->name('sungai.laporan');
Route::get('/sungai/{id}/laporan', CreateLaporanLivewire::class)->whereNumber('id')->name('sungai.laporan.create');

/**
 * Sungai Map Routes
 */
Route::get('/sungai-map', [SungaiController::class, 'map'])->name('sungai.map');
// Route to display Blade page where map placed
Route::get('/user-dashboard', [SungaiController::class, 'index'])->name('user.dashboard');


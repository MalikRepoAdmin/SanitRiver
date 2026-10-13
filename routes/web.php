    <?php

    use App\Http\Controllers\Api\SungaiApiController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\LaporanSungaiController;
    use App\Http\Controllers\SungaiController;
    use App\Http\Controllers\UserController;
    use App\Livewire\CreateLaporanLivewire;
    use App\Livewire\DashboardLivewire;
    use Illuminate\Support\Facades\Route;


    /**
     * Public Routes
     */
    Route::get('/', fn() => redirect()->route('beranda'))->name('home');
    Route::get('/beranda', DashboardLivewire::class)->name('beranda');

    /**
     * Auth Routes
     */
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login');
    Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout');
    /**
     * Peta Sungai
     */
    Route::get('/sungai-map', [SungaiController::class, 'map'])->name('sungai.map');
    Route::get('/sungai/{id}', [SungaiController::class, 'show'])->name('sungai.show');

    /**
     * Laporan Sungai
     */
    Route::get('/laporan-sungai', \App\Livewire\LaporanSungaiLivewire::class)->name('sungai.laporan');

    /**
     * API
     */
    Route::get('/api/sungai-bbox', [SungaiApiController::class, 'getWaterways'])->name('api.sungai.bbox');

    /**
     * Auth Mandatory
     */
    Route::middleware(['auth'])->group(function () {
        Route::get('/create-laporan', CreateLaporanLivewire::class)->name('sungai.laporan.create');
        Route::get('/user-dashboard', [SungaiController::class, 'index'])->name('user.dashboard');
    });

    /**
     * User Resource
     */
    Route::resource('users', UserController::class);

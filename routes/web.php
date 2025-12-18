<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProyekController,
    AuthController,
    MaterialController,
    EquipmentController,
    PengeluaranController,
    JadwalProyekController,
    ClientController,
    UserController,
    ProgressController,
    SdmController,
    LaporanController,
};

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('site-manager.dashboard');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| PROYEK - VIEW (SEMUA ROLE LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,site_manager,administrasi'])
    ->group(function () {

        Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
        Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
        Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');

        Route::get('/proyek/{proyek}', [ProyekController::class, 'show'])->name('proyek.show');
        Route::get('/proyek/{proyek}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
        Route::put('/proyek/{proyek}', [ProyekController::class, 'update'])->name('proyek.update');
        Route::delete('/proyek/{proyek}', [ProyekController::class, 'destroy'])->name('proyek.destroy');

});


/*
|--------------------------------------------------------------------------
| RESOURCE LAIN (LOGIN SAJA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::resource('material', MaterialController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('jadwal', JadwalProyekController::class);
    Route::resource('client', ClientController::class);
    Route::resource('user', UserController::class);
    Route::resource('progress', ProgressController::class);
    Route::resource('sdm', SdmController::class);
});

/*
|--------------------------------------------------------------------------
| PROGRESS ACTION
|--------------------------------------------------------------------------
*/
Route::post('/progress/{id}/validasi', [ProgressController::class, 'validateProgress'])
    ->name('progress.validate')
    ->middleware(['auth','role:site_manager']);

Route::post('/progress/{id}/revisi', [ProgressController::class, 'revisiProgress'])
    ->name('progress.revisi')
    ->middleware(['auth','role:site_manager']);

/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{proyek}', [LaporanController::class, 'show'])->name('laporan.show');
});

/*
|--------------------------------------------------------------------------
| EXPORT PDF
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/proyek/export-pdf', [ProyekController::class, 'exportAllAssignPdf'])
        ->name('proyek.export.pdf');

    Route::get('/laporan/{proyek}/export-pdf', [LaporanController::class, 'exportPdf'])
        ->name('laporan.export.pdf');

    Route::get('/equipment/export/pdf', [EquipmentController::class, 'exportPdf'])
        ->name('equipment.export.pdf');

    Route::get('/pengeluaran/export/pdf', [PengeluaranController::class, 'exportPdf'])
        ->name('pengeluaran.export.pdf');

    Route::get('/progress/export/pdf', [ProgressController::class, 'exportPdf'])
        ->name('progress.export.pdf');

    Route::get('/sdm/export/pdf', [SdmController::class, 'exportPdf'])
        ->name('sdm.export.pdf');
});

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
    Route::get('/', function () {
        return view('welcome');
    });
    // assign SDM
    Route::get('/proyek/{id}/assign/create', [ProyekController::class, 'assignCreate'])->name('proyek.assign.create');
    Route::post('/proyek/{id}/assign', [ProyekController::class, 'assignStore'])->name('proyek.assign.store');
    Route::delete('/proyek/{proyek_id}/assign/{sdm_id}', [ProyekController::class, 'assignDelete'])->name('proyek.assign.destroy');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth');

    Route::get('/dashboard', function () {
        return view('site-manager.dashboard');
    })->middleware('auth');

    Route::resource('material', MaterialController::class);

    Route::resource('equipment', EquipmentController::class);

    Route::resource('pengeluaran', PengeluaranController::class);

    Route::resource('jadwal', JadwalProyekController::class);

    Route::resource('client', ClientController::class);

    Route::resource('user', UserController::class);
    Route::post('/progress/{id}/validasi', [ProgressController::class, 'validateProgress'])->name('progress.validate');
    Route::post('/progress/{id}/revisi', [ProgressController::class, 'revisiProgress'])->name('progress.revisi');
    Route::resource('progress', ProgressController::class);
    Route::resource('sdm', SdmController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{proyek}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::get('/proyek/export-pdf',
    [ProyekController::class, 'exportAllAssignPdf'])->name('proyek.export.pdf');

    // RESOURCE PROYEK
    Route::resource('proyek', ProyekController::class);



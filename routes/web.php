<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProyekController,
    AuthController,
    MaterialController,
    EquipmentController,
    PengeluaranController,
    JadwalProyekController,
    ClientController

};
Route::get('/', function () {
    return view('welcome');
});
Route::resource('proyek', ProyekController::class);
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

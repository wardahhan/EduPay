<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanPembayaranController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SiswaDashboardController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('home'));

// =====================
// AUTH
// =====================
// Login Admin / Petugas
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Login Siswa
Route::get('/login-siswa', [AuthController::class, 'showLoginSiswa'])->name('login.siswa');
Route::post('/login-siswa', [AuthController::class, 'loginSiswa']);

Route::get('/logout', [AuthController::class, 'logout']);

// =====================
// DASHBOARD
// =====================
Route::middleware(['auth','role:admin'])
    ->get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::middleware(['auth','role:petugas'])
    ->get('/petugas/dashboard', [PetugasDashboardController::class, 'index'])
    ->name('petugas.dashboard');

Route::middleware(['auth','role:siswa'])
    ->get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])
    ->name('siswa.dashboard');

// =====================
// ADMIN
// =====================
Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->group(function () {

    // KELAS
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/tambah', [KelasController::class, 'create']);
    Route::post('/kelas', [KelasController::class, 'store']);
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit']);
    Route::put('/kelas/{id}', [KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);

    // SPP
    Route::get('/spp', [SppController::class, 'index']);
    Route::get('/spp/tambah', [SppController::class, 'create']);
    Route::post('/spp', [SppController::class, 'store']);
    Route::get('/spp/{id}/edit', [SppController::class, 'edit']);
    Route::put('/spp/{id}', [SppController::class, 'update']);
    Route::delete('/spp/{id}', [SppController::class, 'destroy']);

    // SISWA
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/tambah', [SiswaController::class, 'create']);
    Route::post('/siswa', [SiswaController::class, 'store']);
    Route::get('/siswa/{id}', [SiswaController::class, 'show']); 
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::put('/siswa/{id}', [SiswaController::class, 'update']);
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

    // PETUGAS
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/tambah', [PetugasController::class, 'create']);
    Route::post('/petugas', [PetugasController::class, 'store']);
    Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit']);
    Route::put('/petugas/{id}', [PetugasController::class, 'update']);
    Route::delete('/petugas/{id}', [PetugasController::class, 'destroy']);

    // LAPORAN PEMBAYARAN (ADMIN ONLY)
    Route::get('/laporan-pembayaran',
        [LaporanPembayaranController::class, 'index']
    )->name('admin.laporan-pembayaran');

    Route::get('/laporan-pembayaran/export',
        [LaporanPembayaranController::class, 'exportExcel']
    )->name('admin.laporan.export');
});

// =====================
// PETUGAS
// =====================
Route::middleware(['auth','role:petugas'])
    ->prefix('petugas')
    ->group(function () {

    // Entri Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'create'])
        ->name('petugas.pembayaran');

    Route::post('/pembayaran', [PembayaranController::class, 'store'])
        ->name('petugas.pembayaran.store');

    // History Pembayaran
    Route::get('/history-pembayaran', [PembayaranController::class, 'index'])
        ->name('petugas.history-pembayaran');

    // Detail Pembayaran
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])
        ->name('petugas.pembayaran.show');

    // Cetak Bukti
    Route::get('/cetak-bukti/{id}', [PembayaranController::class, 'cetak'])
        ->name('petugas.cetak-bukti');
});

Route::middleware(['auth','role:siswa'])
    ->prefix('siswa')
    ->group(function () {

        Route::get('/dashboard', [SiswaDashboardController::class, 'index'])
            ->name('siswa.dashboard');

        Route::get('/riwayat-pembayaran', [SiswaDashboardController::class, 'riwayatPembayaran'])
            ->name('siswa.riwayat-pembayaran');

        Route::get('/profil', [SiswaDashboardController::class, 'profil'])
            ->name('siswa.profil');
    });




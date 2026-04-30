<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/service', [App\Http\Controllers\HomeController::class, 'service']);

Route::get('/pemesanan', [App\Http\Controllers\HomeController::class, 'pemesanan'])->name('pemesanan');

Route::post('/pemesanan/submit', [App\Http\Controllers\HomeController::class, 'submitpemesanan'])->name('pemesanan.submit');
Route::get('/pemesanan/pembayaran/{id}', [App\Http\Controllers\HomeController::class, 'pembayaran'])->name('pemesanan.pembayaran');
Route::get('/riwayat', [App\Http\Controllers\HomeController::class, 'riwayat'])->name('riwayat');
Route::post('/pembayaran/{id}/konfirmasi', [App\Http\Controllers\HomeController::class, 'konfirmasiPembayaran'])->name('pembayaran.konfirmasi');
Route::post('/midtrans/callback', [App\Http\Controllers\MidtransController::class, 'callback']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Admin routes - menggunakan view dari folder admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/transaksi', [App\Http\Controllers\AdminTransaksiController::class, 'index'])->name('admin.transaksi');
    Route::post('/transaksi', [App\Http\Controllers\AdminTransaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::put('/transaksi/{id}', [App\Http\Controllers\AdminTransaksiController::class, 'updateStatus'])->name('admin.transaksi.update');

    Route::get('/laporan', [App\Http\Controllers\AdminController::class, 'laporan'])->name('admin.laporan');

    Route::get('/layanan', [App\Http\Controllers\LayananController::class, 'index'])->name('admin.layanan');
    Route::get('/layanan/create', [App\Http\Controllers\LayananController::class, 'create'])->name('admin.layanan.create');
    Route::post('/layanan/create', [App\Http\Controllers\LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('/layanan/{id}/edit', [App\Http\Controllers\LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/layanan/{id}', [App\Http\Controllers\LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}', [App\Http\Controllers\LayananController::class, 'destroy'])->name('admin.layanan.destroy');

    Route::get('/aktivitas', [App\Http\Controllers\AdminController::class, 'aktivitas'])->name('admin.aktivitas');

    Route::get('/karyawan', [App\Http\Controllers\AdminKaryawanController::class, 'index'])->name('admin.karyawan');
    Route::get('/karyawan/create', [App\Http\Controllers\AdminKaryawanController::class, 'create'])->name('admin.karyawan.create');
    Route::post('/karyawan/create', [App\Http\Controllers\AdminKaryawanController::class, 'store'])->name('admin.karyawan.store');
    Route::get('/karyawan/{id}/edit', [App\Http\Controllers\AdminKaryawanController::class, 'edit'])->name('admin.karyawan.edit');
    Route::put('/karyawan/{id}', [App\Http\Controllers\AdminKaryawanController::class, 'update'])->name('admin.karyawan.update');
    Route::delete('/karyawan/{id}', [App\Http\Controllers\AdminKaryawanController::class, 'destroy'])->name('admin.karyawan.destroy');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
});

// Owner routes
Route::middleware(['auth', 'role:owner'])->prefix('owner')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::get('/transaksi', [App\Http\Controllers\OwnerController::class, 'transaksi'])->name('owner.transaksi');
    Route::get('/laporan', [App\Http\Controllers\OwnerController::class, 'laporan'])->name('owner.laporan');
    Route::get('/penggajian', [App\Http\Controllers\OwnerController::class, 'penggajian'])->name('owner.penggajian');
    Route::post('/penggajian', [App\Http\Controllers\OwnerController::class, 'penggajianStore'])->name('owner.penggajian.store');
    
    Route::get('/', function () {
        return redirect()->route('owner.dashboard');
    });
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'pageView']);
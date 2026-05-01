<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/service', [App\Http\Controllers\HomeController::class, 'service']);

Route::middleware(['auth'])->group(function () {
    Route::get('/pemesanan', [App\Http\Controllers\HomeController::class, 'pemesanan'])->name('pemesanan');
    Route::post('/pemesanan/submit', [App\Http\Controllers\HomeController::class, 'submitpemesanan'])->name('pemesanan.submit');
    Route::get('/pemesanan/pembayaran/{id}', [App\Http\Controllers\HomeController::class, 'pembayaran'])->name('pemesanan.pembayaran');

    Route::post('/pembayaran/{id}/konfirmasi', [App\Http\Controllers\HomeController::class, 'konfirmasiPembayaran'])->name('pembayaran.konfirmasi');

    // Profile Routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


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


// Password Reset Routes
Route::get('/forgot-password', [App\Http\Controllers\AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [App\Http\Controllers\AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');


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

    // Absensi Routes
    Route::get('/absensi', [App\Http\Controllers\AdminAbsensiController::class, 'index'])->name('admin.absensi');
    Route::post('/absensi', [App\Http\Controllers\AdminAbsensiController::class, 'store'])->name('admin.absensi.store');

    // Penggajian Routes
    Route::get('/penggajian', [App\Http\Controllers\AdminPenggajianController::class, 'index'])->name('admin.penggajian');
    Route::post('/penggajian/generate', [App\Http\Controllers\AdminPenggajianController::class, 'generate'])->name('admin.penggajian.generate');
    Route::get('/penggajian/{id}/slip', [App\Http\Controllers\AdminPenggajianController::class, 'cetakSlip'])->name('admin.penggajian.slip');
    Route::get('/laporan-gaji', [App\Http\Controllers\AdminPenggajianController::class, 'laporan'])->name('admin.laporan.gaji');

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
    Route::put('/penggajian/{id}/approve', [App\Http\Controllers\OwnerController::class, 'approveGaji'])->name('owner.penggajian.approve');

    // Admin Management
    Route::get('/admins', [App\Http\Controllers\OwnerController::class, 'adminIndex'])->name('owner.admins');
    Route::post('/admins', [App\Http\Controllers\OwnerController::class, 'adminStore'])->name('owner.admins.store');
    Route::delete('/admins/{id}', [App\Http\Controllers\OwnerController::class, 'adminDestroy'])->name('owner.admins.destroy');
    
    Route::get('/', function () {
        return redirect()->route('owner.dashboard');
    });
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'pageView']);
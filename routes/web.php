<?php

use Illuminate\Support\Facades\Route;

Route::get('/linkstorage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage linked';
});

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
    Route::post('/testimoni', [App\Http\Controllers\TestimoniController::class, 'store'])->name('testimoni.store');
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

// Google Auth Routes
Route::get('/auth/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Password Reset Routes
Route::get('/forgot-password', [App\Http\Controllers\AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'forgotPassword'])->name('password.email');

// OTP Verification Routes
Route::get('/verify-otp', [App\Http\Controllers\AuthController::class, 'showVerifyOtp'])->name('verify.otp');
Route::post('/verify-otp', [App\Http\Controllers\AuthController::class, 'verifyOtp'])->name('verify.otp.post');

// Reset Password
Route::get('/reset-password', [App\Http\Controllers\AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])->name('password.update');


// Admin routes - menggunakan view dari folder admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/transaksi', [App\Http\Controllers\AdminTransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/pesanan', [App\Http\Controllers\AdminTransaksiController::class, 'pesananAktif'])->name('admin.pesanan');
    Route::post('/transaksi', [App\Http\Controllers\AdminTransaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::get('/transaksi/{id}', [App\Http\Controllers\AdminTransaksiController::class, 'show'])->name('admin.transaksi.show');
    Route::put('/transaksi/{id}', [App\Http\Controllers\AdminTransaksiController::class, 'updateStatus'])->name('admin.transaksi.update');

    // Manajemen Bed Routes
    Route::get('/bed', [App\Http\Controllers\AdminBedController::class, 'index'])->name('admin.bed');
    Route::put('/bed/{transaksi_id}/assign', [App\Http\Controllers\AdminBedController::class, 'assign'])->name('admin.bed.assign');
    Route::put('/bed/{transaksi_id}/release', [App\Http\Controllers\AdminBedController::class, 'release'])->name('admin.bed.release');
    Route::put('/bed/{transaksi_id}/complete', [App\Http\Controllers\AdminBedController::class, 'complete'])->name('admin.bed.complete');

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
    Route::get('/absensi/create', [App\Http\Controllers\AdminAbsensiController::class, 'create'])->name('admin.absensi.create');
    Route::post('/absensi', [App\Http\Controllers\AdminAbsensiController::class, 'store'])->name('admin.absensi.store');
    Route::get('/absensi/{id}/edit', [App\Http\Controllers\AdminAbsensiController::class, 'edit'])->name('admin.absensi.edit');
    Route::put('/absensi/{id}', [App\Http\Controllers\AdminAbsensiController::class, 'update'])->name('admin.absensi.update');
    Route::delete('/absensi/{id}', [App\Http\Controllers\AdminAbsensiController::class, 'destroy'])->name('admin.absensi.destroy');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
});

// Owner routes
Route::middleware(['auth', 'role:owner'])->prefix('owner')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::get('/transaksi', [App\Http\Controllers\OwnerController::class, 'transaksi'])->name('owner.transaksi');
    Route::get('/laporan', [App\Http\Controllers\OwnerController::class, 'laporan'])->name('owner.laporan');
    Route::get('/laporan-pendapatan', [App\Http\Controllers\OwnerController::class, 'laporanPendapatan'])->name('owner.laporan-pendapatan');

    // Admin Management
    Route::get('/admins', [App\Http\Controllers\OwnerController::class, 'adminIndex'])->name('owner.admins');
    Route::post('/admins', [App\Http\Controllers\OwnerController::class, 'adminStore'])->name('owner.admins.store');
    Route::delete('/admins/{id}', [App\Http\Controllers\OwnerController::class, 'adminDestroy'])->name('owner.admins.destroy');

    // Penggajian
    Route::get('/penggajian', [App\Http\Controllers\OwnerController::class, 'penggajian'])->name('owner.penggajian');
    Route::get('/penggajian/{id}', [App\Http\Controllers\OwnerController::class, 'penggajianDetail'])->name('owner.penggajian.detail');
    Route::put('/penggajian/{id}/approve', [App\Http\Controllers\OwnerController::class, 'penggajianApprove'])->name('owner.penggajian.approve');
    
    Route::get('/', function () {
        return redirect()->route('owner.dashboard');
    });
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'pageView']);
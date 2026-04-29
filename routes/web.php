<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/service', [App\Http\Controllers\HomeController::class, 'service']);

Route::get('/pemesanan', [App\Http\Controllers\HomeController::class, 'pemesanan'])->name('pemesanan');

Route::post('/pemesanan/submit', [App\Http\Controllers\HomeController::class, 'submitpemesanan'])->name('pemesanan.submit');

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
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $totalLayanan = \App\Models\Layanan::count();
        $totalKaryawan = \App\Models\Karyawan::count();
        return view('admin.pages.dashboard.dashboard', ['title' => 'Admin Dashboard', 'totalLayanan' => $totalLayanan, 'totalKaryawan' => $totalKaryawan]);
    })->name('admin.dashboard');

    Route::get('/transaksi', [App\Http\Controllers\AdminTransaksiController::class, 'index'])->name('admin.transaksi');
    Route::post('/transaksi', [App\Http\Controllers\AdminTransaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::put('/transaksi/{id}', [App\Http\Controllers\AdminTransaksiController::class, 'updateStatus'])->name('admin.transaksi.update');

    Route::get('/laporan', function () {
        return view('admin.pages.laporan.index', ['title' => 'Laporan Transaksi']);
    })->name('admin.laporan');

    Route::get('/layanan', [App\Http\Controllers\LayanaController::class, 'index'])->name('admin.layanan');
    Route::get('/layanan/create', [App\Http\Controllers\LayanaController::class, 'create'])->name('admin.layanan.create');
    Route::post('/layanan/create', [App\Http\Controllers\LayanaController::class, 'store'])->name('admin.layanan.store');
    Route::get('/layanan/{id}/edit', [App\Http\Controllers\LayanaController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/layanan/{id}', [App\Http\Controllers\LayanaController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}', [App\Http\Controllers\LayanaController::class, 'destroy'])->name('admin.layanan.destroy');

    Route::get('/aktivitas', function () {
        return view('admin.pages.aktivitas.index', ['title' => 'Log Aktivitas']);
    })->name('admin.aktivitas');

    Route::get('/karyawan', function () {
        $karyawans = \App\Models\Karyawan::all();
        return view('admin.pages.karyawan.index', ['title' => 'Data Karyawan', 'karyawans' => $karyawans]);
    })->name('admin.karyawan');

    Route::get('/karyawan/create', function () {
        return view('admin.pages.karyawan.create', ['title' => 'Tambah Karyawan']);
    })->name('admin.karyawan.create');

    Route::post('/karyawan/create', function () {
        \App\Models\Karyawan::create([
            'nama' => request('nama'),
            'tanggal' => request('tanggal'),
            'terapi_yang_dilakukan' => request('terapi_yang_dilakukan'),
            'status' => request('status'),
        ]);
        return redirect()->route('admin.karyawan')->with('success', 'Karyawan berhasil ditambahkan');
    })->name('admin.karyawan.store');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'pageView']);
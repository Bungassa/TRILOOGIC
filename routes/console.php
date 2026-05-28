<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Transaksi;
use Illuminate\Support\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('transaksi:cancel-expired', function () {
    $expiredTransaksis = Transaksi::where('status', 'pending')
        ->where('status_pembayaran', 'belum_bayar')
        ->where('created_at', '<', Carbon::now()->subMinutes(10))
        ->get();

    foreach ($expiredTransaksis as $transaksi) {
        $transaksi->status = 'dibatalkan';
        $transaksi->save();
        \App\Models\ActivityLog::log('Sistem', 'Membatalkan otomatis transaksi #' . $transaksi->id . ' karena tidak ada pembayaran dalam 10 menit.');
    }
})->purpose('Cancel uncompleted transactions after 10 minutes')->everyMinute();

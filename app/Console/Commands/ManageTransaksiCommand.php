<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaksi;
use Carbon\Carbon;

class ManageTransaksiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:manage';

    protected $description = 'Otomatis update status pesanan berdasarkan waktu (menunggu -> proses -> selesai)';

    public function handle()
    {
        $now = now();

        // 1. Ubah menunggu -> proses
        $pendingTransactions = Transaksi::with(['layanan', 'karyawan'])
            ->where('status', 'menunggu')
            ->whereNotNull('karyawan_id')
            ->where('tanggal', '<=', $now->toDateString())
            ->get()
            ->filter(function($trx) use ($now) {
                if ($trx->tanggal < $now->toDateString()) return true;
                return $trx->jam <= $now->toTimeString();
            });

        foreach ($pendingTransactions as $transaksi) {
            /** @var \App\Models\Transaksi $transaksi */
            $transaksi->status = 'proses';
            $transaksi->save();
        }

        // 2. Ubah proses -> selesai
        $inProgressTransactions = Transaksi::with(['layanan'])
            ->where('status', 'proses')
            ->get();

        foreach ($inProgressTransactions as $transaksi) {
            /** @var \App\Models\Transaksi $transaksi */
            $startDateTime = Carbon::parse($transaksi->tanggal . ' ' . $transaksi->jam);
            $duration = $transaksi->layanan->durasi ?? 60;
            $endDateTime = $startDateTime->copy()->addMinutes($duration);

            if ($now >= $endDateTime) {
                $transaksi->status = 'selesai';
                $transaksi->save();
            }
        }
    }
}

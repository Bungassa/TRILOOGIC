<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ManageBedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bed:manage';

    protected $description = 'Otomatis assign bed dan selesaikan transaksi berdasarkan waktu dan durasi';

    public function handle()
    {
        $now = now();

        // 1. Assign Bed
        $pendingTransactions = \App\Models\Transaksi::with(['layanan', 'karyawan'])
            ->where('status', 'pending')
            ->whereNotNull('karyawan_id')
            ->whereNull('bed_id')
            ->where('tanggal', '<=', $now->toDateString())
            ->get()
            ->filter(function($trx) use ($now) {
                if ($trx->tanggal < $now->toDateString()) return true;
                return $trx->jam <= $now->toTimeString();
            });

        $occupiedBeds = \App\Models\Transaksi::whereNotNull('bed_id')->whereIn('status', ['pending', 'dikerjakan'])->pluck('bed_id')->toArray();
        $availableMaleBeds = array_diff([1, 2, 3, 4], $occupiedBeds);
        $availableFemaleBeds = array_diff([5, 6, 7, 8], $occupiedBeds);

        foreach ($pendingTransactions as $transaksi) {
            /** @var \App\Models\Transaksi $transaksi */
            if ($transaksi->jenis_kelamin === 'L' && count($availableMaleBeds) > 0) {
                $bed = array_shift($availableMaleBeds);
                $transaksi->bed_id = $bed;
                $transaksi->status = 'dikerjakan';
                $transaksi->save();
            } elseif ($transaksi->jenis_kelamin === 'P' && count($availableFemaleBeds) > 0) {
                $bed = array_shift($availableFemaleBeds);
                $transaksi->bed_id = $bed;
                $transaksi->status = 'dikerjakan';
                $transaksi->save();
            }
        }

        // 2. Finish Bed
        $inProgressTransactions = \App\Models\Transaksi::with(['layanan'])
            ->where('status', 'dikerjakan')
            ->whereNotNull('bed_id')
            ->get();

        foreach ($inProgressTransactions as $transaksi) {
            /** @var \App\Models\Transaksi $transaksi */
            $startDateTime = \Carbon\Carbon::parse($transaksi->tanggal . ' ' . $transaksi->jam);
            $duration = $transaksi->layanan->durasi ?? 60;
            $endDateTime = $startDateTime->copy()->addMinutes($duration);

            if (now() >= $endDateTime) {
                $transaksi->status = 'selesai';
                $transaksi->bed_id = null;
                $transaksi->save();
            }
        }
    }
}

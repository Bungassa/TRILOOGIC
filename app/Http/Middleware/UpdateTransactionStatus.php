<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Transaksi;
use Carbon\Carbon;

class UpdateTransactionStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        $currentTime = $now->format('H:i');

        // 1. Update menunggu ke proses jika sudah waktunya dan karyawan sudah dipilih
        Transaksi::where('status', 'menunggu')
            ->whereNotNull('karyawan_id')
            ->where(function($query) use ($today, $currentTime) {
                $query->where('tanggal', '<', $today)
                      ->orWhere(function($q) use ($today, $currentTime) {
                          $q->where('tanggal', '=', $today)
                            ->where('jam', '<=', $currentTime);
                      });
            })
            ->update(['status' => 'proses']);

        // 2. Update proses ke selesai jika sudah lewat durasi
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

        return $next($request);
    }
}

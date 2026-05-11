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
        // Jalankan logika update status hanya pada request tertentu (misal admin atau home)
        // Atau jalankan setiap menit (bisa gunakan cache untuk throttling)
        
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        $currentTime = $now->format('H:i');
        $oneHourAgo = $now->copy()->subHour()->format('H:i');

        // 1. Update Pending ke Dikerjakan jika sudah waktunya
        Transaksi::where('status', 'pending')
            ->where('tanggal', '<=', $today)
            ->where('jam', '<=', $currentTime)
            ->update(['status' => 'dikerjakan']);

        // 2. Update Dikerjakan ke Selesai jika sudah lewat 1 jam
        Transaksi::where('status', 'dikerjakan')
            ->where('tanggal', '<=', $today)
            ->where('jam', '<=', $oneHourAgo)
            ->update(['status' => 'selesai']);

        return $next($request);
    }
}

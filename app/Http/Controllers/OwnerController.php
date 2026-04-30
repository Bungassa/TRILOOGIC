<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Carbon\Carbon;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $totalLayanan = Layanan::count();
        $totalKaryawan = Karyawan::count();
        $totalTransaksi = Transaksi::count();
        $transaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();
        
        // Owner specific: total revenue
        $totalRevenue = Transaksi::where('status_pembayaran', 'lunas')->sum('total_harga');
        
        $recentTransactions = Transaksi::with('layanan')
            ->latest()
            ->take(10)
            ->get();

        return view('owner.pages.dashboard', [
            'title' => 'Owner Dashboard',
            'totalLayanan' => $totalLayanan,
            'totalKaryawan' => $totalKaryawan,
            'totalTransaksi' => $totalTransaksi,
            'transaksiHariIni' => $transaksiHariIni,
            'totalRevenue' => $totalRevenue,
            'recentTransactions' => $recentTransactions
        ]);
    }

    public function laporan()
    {
        $transaksis = Transaksi::with('layanan')->latest()->get();
        return view('owner.pages.laporan', [
            'title' => 'Laporan Pendapatan',
            'transaksis' => $transaksis
        ]);
    }
}

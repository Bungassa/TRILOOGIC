<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalLayanan = Layanan::count();
        $totalKaryawan = Karyawan::count();
        $totalTransaksi = Transaksi::count();
        $transaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();
        $totalRevenue = Transaksi::where('status_pembayaran', 'lunas')->sum('total_harga');
        
        $recentTransactions = Transaksi::with('layanan')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.pages.dashboard.dashboard', [
            'title' => 'Admin Dashboard',
            'totalLayanan' => $totalLayanan,
            'totalKaryawan' => $totalKaryawan,
            'totalTransaksi' => $totalTransaksi,
            'transaksiHariIni' => $transaksiHariIni,
            'totalRevenue' => $totalRevenue,
            'recentTransactions' => $recentTransactions
        ]);
    }

    public function aktivitas()
    {
        return view('admin.pages.aktivitas.index', ['title' => 'Log Aktivitas']);
    }

    public function laporan()
    {
        return view('admin.pages.laporan.index', ['title' => 'Laporan Transaksi']);
    }
}

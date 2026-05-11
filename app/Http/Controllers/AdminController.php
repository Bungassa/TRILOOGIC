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
        \App\Models\ActivityLog::log('Kunjungan', \Illuminate\Support\Facades\Auth::user()->name . ' membuka Dashboard Admin');
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
        \App\Models\ActivityLog::log('Kunjungan', \Illuminate\Support\Facades\Auth::user()->name . ' membuka Log Aktivitas');
        $logs = \App\Models\ActivityLog::with('user')->latest()->paginate(25);
        return view('admin.pages.aktivitas.index', [
            'title' => 'Log Aktivitas',
            'logs' => $logs
        ]);
    }

    public function laporan(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        $transaksis = Transaksi::with('layanan')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->orderBy('created_at', 'desc')
            ->get();

        $totalRevenue = $transaksis->where('status_pembayaran', 'lunas')->sum('total_harga');
        $totalTransaksi = $transaksis->count();

        return view('admin.pages.laporan.index', [
            'title' => 'Laporan Transaksi',
            'transaksis' => $transaksis,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'totalRevenue' => $totalRevenue,
            'totalTransaksi' => $totalTransaksi
        ]);
    }
}

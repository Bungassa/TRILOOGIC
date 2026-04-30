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

    public function transaksi()
    {
        $transaksis = Transaksi::with('layanan')->latest()->get();
        return view('owner.pages.transaksi', [
            'title' => 'Data Transaksi',
            'transaksis' => $transaksis
        ]);
    }

    public function laporan()
    {
        $transaksis = Transaksi::with('layanan')->where('status_pembayaran', 'lunas')->latest()->get();
        return view('owner.pages.laporan', [
            'title' => 'Laporan Pendapatan',
            'transaksis' => $transaksis
        ]);
    }

    public function penggajian()
    {
        $penggajians = \App\Models\Penggajian::with('karyawan')->latest()->get();
        return view('owner.pages.penggajian', [
            'title' => 'Data Penggajian',
            'penggajians' => $penggajians
        ]);
    }

    public function penggajianStore(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'bulan' => 'required',
            'tahun' => 'required',
            'gaji_pokok' => 'required|numeric',
            'bonus' => 'required|numeric',
            'potongan' => 'required|numeric',
        ]);

        $totalGaji = $request->gaji_pokok + $request->bonus - $request->potongan;

        \App\Models\Penggajian::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'gaji_pokok' => $request->gaji_pokok,
            'bonus' => $request->bonus,
            'potongan' => $request->potongan,
            'total_gaji' => $totalGaji,
            'status_pembayaran' => 'dibayar',
            'tanggal_bayar' => now(),
        ]);

        return redirect()->route('owner.penggajian')->with('success', 'Data gaji berhasil disimpan');
    }
}

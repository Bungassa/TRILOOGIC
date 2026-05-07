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

        // Revenue
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

    // Admin Management
    public function adminIndex()
    {
        $admins = \App\Models\User::where('role', 'admin')->get();
        return view('owner.pages.admins.index', [
            'title' => 'Kelola Admin',
            'admins' => $admins
        ]);
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'admin'
        ]);

        return redirect()->back()->with('success', 'Admin baru berhasil ditambahkan');
    }

    public function adminDestroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Akses Admin telah dicabut');
    }
}

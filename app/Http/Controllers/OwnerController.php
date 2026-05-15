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
        $transaksis = Transaksi::with('layanan')->orderBy('tanggal', 'desc')->orderBy('jam', 'desc')->paginate(25);
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

    public function adminDestroy(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Akses Admin telah dicabut');
    }

    public function penggajian(Request $request)
    {
        $bulan = (int) $request->get('bulan', date('m'));
        $tahun = (int) $request->get('tahun', date('Y'));

        // Fetch payroll records and group them by employee
        $penggajians = \App\Models\Penggajian::with(['karyawan', 'layanan', 'transaksi'])
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get()
            ->groupBy('karyawan_id');

        return view('owner.pages.penggajian', [
            'title' => 'Laporan Penggajian',
            'penggajians' => $penggajians,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }

    public function penggajianDetail(Request $request, string $id)
    {
        $bulan = (int) $request->get('bulan', date('m'));
        $tahun = (int) $request->get('tahun', date('Y'));
        $karyawan = Karyawan::findOrFail($id);

        $records = \App\Models\Penggajian::with(['layanan', 'transaksi'])
            ->where('karyawan_id', $id)
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->get();

        return view('owner.pages.penggajian-detail', [
            'title' => 'Detail Gaji ' . $karyawan->nama,
            'karyawan' => $karyawan,
            'records' => $records,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }

    public function penggajianApprove(Request $request, string $id)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        \App\Models\Penggajian::where('karyawan_id', $id)
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->where('status_pembayaran', 'pending')
            ->update([
                'status_pembayaran' => 'dibayar',
                'tanggal_bayar' => date('Y-m-d')
            ]);

        return redirect()->back()->with('success', 'Gaji karyawan berhasil dibayar untuk periode tersebut');
    }
}

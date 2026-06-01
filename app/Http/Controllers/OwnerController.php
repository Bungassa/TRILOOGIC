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

        // Revenue (50% pendapatan bersih owner)
        $totalRevenue = \App\Models\Penggajian::sum('pendapatan_owner');

        $recentTransactions = Transaksi::with('layanan')
            ->latest()
            ->take(10)
            ->get();

        // Chart Data: Pendapatan 6 bulan terakhir
        $chartLabels = [];
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->startOfMonth()->subMonths($i);
            $chartLabels[] = $date->translatedFormat('M Y');
            
            $revenue = \App\Models\Penggajian::whereHas('transaksi', function($q) use ($date) {
                $q->whereYear('tanggal', $date->year)
                  ->whereMonth('tanggal', $date->month);
            })->sum('pendapatan_owner');

            $chartData[] = $revenue;
        }

        return view('owner.pages.dashboard', [
            'title' => 'Owner Dashboard',
            'totalLayanan' => $totalLayanan,
            'totalKaryawan' => $totalKaryawan,
            'totalTransaksi' => $totalTransaksi,
            'transaksiHariIni' => $transaksiHariIni,
            'totalRevenue' => $totalRevenue,
            'recentTransactions' => $recentTransactions,
            'chartLabels' => $chartLabels,
            'chartData' => $chartData
        ]);
    }

    public function transaksi(Request $request)
    {
        $tanggal = $request->get('tanggal');
        $bulanTahun = $request->get('bulan_tahun');

        $query = Transaksi::with('layanan')->orderBy('tanggal', 'desc')->orderBy('jam', 'desc');

        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        } elseif ($bulanTahun) {
            $parts = explode('-', $bulanTahun);
            if(count($parts) == 2) {
                $query->whereYear('tanggal', $parts[0])->whereMonth('tanggal', $parts[1]);
            }
        }

        $transaksis = $query->paginate(25)->appends($request->all());

        return view('owner.pages.transaksi', [
            'title' => 'Data Transaksi',
            'transaksis' => $transaksis,
            'tanggal' => $tanggal,
            'bulan_tahun' => $bulanTahun
        ]);
    }

    public function laporan(Request $request)
    {
        $bulan = (int) $request->get('bulan', date('m'));
        $tahun = (int) $request->get('tahun', date('Y'));

        $penggajians = \App\Models\Penggajian::with(['karyawan', 'layanan', 'transaksi'])
            ->whereHas('transaksi', function($query) use ($bulan, $tahun) {
                $query->whereYear('tanggal', $tahun)
                      ->whereMonth('tanggal', $bulan);
            })
            ->get()
            ->groupBy('karyawan_id');

        return view('owner.pages.laporan', [
            'title' => 'Laporan Penggajian',
            'penggajians' => $penggajians,
            'bulan' => sprintf('%02d', $bulan),
            'tahun' => $tahun
        ]);
    }

    public function laporanPendapatan(Request $request)
    {
        $bulan = (int) $request->get('bulan', date('m'));
        $tahun = (int) $request->get('tahun', date('Y'));
        $tanggal = $request->get('tanggal');

        $penggajians = \App\Models\Penggajian::with(['karyawan', 'layanan', 'transaksi'])
            ->whereHas('transaksi', function($query) use ($bulan, $tahun, $tanggal) {
                $query->whereYear('tanggal', $tahun)
                      ->whereMonth('tanggal', $bulan);
                
                if (!empty($tanggal)) {
                    $query->whereDay('tanggal', $tanggal);
                }
            })
            ->get();

        return view('owner.pages.laporan-pendapatan', [
            'title' => 'Laporan Pendapatan',
            'penggajians' => $penggajians,
            'bulan' => sprintf('%02d', $bulan),
            'tahun' => $tahun,
            'tanggal' => $tanggal
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
            ->whereHas('transaksi', function($query) use ($bulan, $tahun) {
                $query->whereYear('tanggal', $tahun)
                      ->whereMonth('tanggal', $bulan);
            })
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
            ->whereHas('transaksi', function($query) use ($bulan, $tahun) {
                $query->whereYear('tanggal', $tahun)
                      ->whereMonth('tanggal', $bulan);
            })
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

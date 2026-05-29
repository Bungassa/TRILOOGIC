<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminAbsensiController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->get('bulan', date('Y-m'));
        $karyawanId = $request->get('karyawan_id');

        $year = date('Y', strtotime($bulan));
        $month = date('m', strtotime($bulan));
        $daysInMonth = \Carbon\Carbon::parse($bulan . '-01')->daysInMonth;

        // Query transactions for the selected month
        $transaksiQuery = Transaksi::with(['karyawan'])
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month);

        if ($karyawanId) {
            $transaksiQuery->where('karyawan_id', $karyawanId);
        }

        $transaksis = $transaksiQuery->get();

        $absensis = collect();
        
        $karyawans = Karyawan::where('status', 'aktif')->get();
        $targetKaryawans = $karyawanId ? $karyawans->where('id', $karyawanId) : $karyawans;

        foreach ($targetKaryawans as $karyawan) {
            $karyawanTransaksis = $transaksis->where('karyawan_id', $karyawan->id);
            
            // Get unique dates where employee had transactions
            $uniqueDates = $karyawanTransaksis->pluck('tanggal')->unique()->count();
            $totalTransaksi = $karyawanTransaksis->count();

            $absensis->push((object)[
                'id' => 'KRY-' . $karyawan->id,
                'karyawan' => $karyawan,
                'bulan' => $bulan,
                'masuk' => $uniqueDates,
                'tidak_masuk' => $daysInMonth - $uniqueDates,
                'total_transaksi' => $totalTransaksi,
            ]);
        }

        return view('admin.pages.absensi.index', [
            'title' => 'Absensi Karyawan (Bulanan)',
            'absensis' => $absensis,
            'karyawans' => $karyawans,
            'bulan' => $bulan,
            'karyawanId' => $karyawanId
        ]);
    }
}

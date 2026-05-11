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
        $tanggal = $request->get('tanggal', date('Y-m-d'));
        $karyawanId = $request->get('karyawan_id');

        // Get transactions grouped by karyawan
        $transaksiQuery = Transaksi::with(['karyawan', 'layanan'])
            ->whereDate('tanggal', $tanggal);

        if ($karyawanId) {
            $transaksiQuery->where('karyawan_id', $karyawanId);
        }

        $transaksisByKaryawan = $transaksiQuery->get()->groupBy('karyawan_id');

        $absensis = collect();
        foreach ($transaksisByKaryawan as $id => $items) {
            $karyawan = $items->first()->karyawan;
            if (!$karyawan) continue;

            $absensis->push((object)[
                'id' => 'TRX-' . $id,
                'karyawan' => $karyawan,
                'tanggal' => $tanggal,
                'transaksi_data' => $items,
                'total_transaksi' => $items->count(),
                'is_from_transaction' => true
            ]);
        }

        $karyawans = Karyawan::where('status', 'aktif')->get();

        return view('admin.pages.absensi.index', [
            'title' => 'Absensi Karyawan (Berdasarkan Transaksi)',
            'absensis' => $absensis,
            'karyawans' => $karyawans,
            'tanggal' => $tanggal,
            'karyawanId' => $karyawanId
        ]);
    }
}

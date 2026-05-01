<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Penggajian;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminPenggajianController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->get('bulan', Carbon::now()->format('m'));
        $tahun = $request->get('tahun', Carbon::now()->format('Y'));

        $penggajians = Penggajian::with('karyawan')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();

        return view('admin.pages.penggajian.index', [
            'title' => 'Data Penggajian',
            'penggajians' => $penggajians,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }

    public function generate(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        
        $karyawans = Karyawan::all();

        foreach ($karyawans as $karyawan) {
            // Hitung Absensi
            $absensi = Absensi::where('karyawan_id', $karyawan->id)
                ->whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', $tahun)
                ->get();

            $hadir = $absensi->where('status', 'hadir')->count();
            $lembur = $absensi->sum('lembur_jam');
            $alpa = $absensi->where('status', 'alpa')->count();

            // Formula Gaji (Contoh)
            // Gaji Pokok - (Potongan Alpa) + Bonus Lembur
            $bonusLembur = $lembur * 20000; // Misal 20rb per jam
            $potonganAlpa = $alpa * 50000; // Misal 50rb per alpa
            
            $totalGaji = $karyawan->gaji_pokok + $bonusLembur - $potonganAlpa;

            Penggajian::updateOrCreate(
                [
                    'karyawan_id' => $karyawan->id,
                    'bulan' => $bulan,
                    'tahun' => $tahun
                ],
                [
                    'gaji_pokok' => $karyawan->gaji_pokok,
                    'bonus' => $bonusLembur,
                    'potongan' => $potonganAlpa,
                    'total_gaji' => $totalGaji,
                    'status_pembayaran' => 'pending'
                ]
            );
        }

        return redirect()->back()->with('success', 'Gaji berhasil dihitung untuk bulan ini');
    }

    public function cetakSlip($id)
    {
        $penggajian = Penggajian::with('karyawan')->findOrFail($id);
        
        $pdf = Pdf::loadView('admin.pages.penggajian.slip', compact('penggajian'));
        return $pdf->stream('Slip_Gaji_' . $penggajian->karyawan->nama . '.pdf');
    }

    public function laporan(Request $request)
    {
        $bulan = $request->get('bulan', Carbon::now()->format('m'));
        $tahun = $request->get('tahun', Carbon::now()->format('Y'));

        $penggajians = Penggajian::with('karyawan')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();

        return view('admin.pages.penggajian.laporan', [
            'title' => 'Laporan Penggajian',
            'penggajians' => $penggajians,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }
}

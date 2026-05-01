<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use Carbon\Carbon;

class AdminAbsensiController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', Carbon::today()->toDateString());
        $karyawans = Karyawan::all();
        
        // Ambil data absensi hari ini untuk semua karyawan
        $absensis = Absensi::whereDate('tanggal', $tanggal)->get()->keyBy('karyawan_id');

        return view('admin.pages.absensi.index', [
            'title' => 'Input Absensi',
            'karyawans' => $karyawans,
            'absensis' => $absensis,
            'tanggal' => $tanggal
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'absensi' => 'required|array',
            'absensi.*.status' => 'required|in:hadir,sakit,izin,alpa',
            'absensi.*.lembur_jam' => 'nullable|integer|min:0'
        ]);

        foreach ($request->absensi as $karyawan_id => $data) {
            Absensi::updateOrCreate(
                [
                    'karyawan_id' => $karyawan_id,
                    'tanggal' => $request->tanggal
                ],
                [
                    'status' => $data['status'],
                    'lembur_jam' => $data['lembur_jam'] ?? 0
                ]
            );
        }

        return redirect()->back()->with('success', 'Absensi berhasil disimpan');
    }
}

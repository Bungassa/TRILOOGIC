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
        
        $query = Absensi::with(['karyawan', 'transaksis.layanan'])
            ->where('tanggal', $tanggal);
        
        if ($karyawanId) {
            $query->where('karyawan_id', $karyawanId);
        }
        
        $absensis = $query->orderBy('created_at', 'desc')->get();
        $karyawans = Karyawan::where('status', 'aktif')->get();
        
        // Get treatment data for each absensi
        foreach ($absensis as $absensi) {
            $transaksis = Transaksi::with('layanan')
                ->where('karyawan_id', $absensi->karyawan_id)
                ->whereDate('tanggal', $absensi->tanggal)
                ->get();
            $absensi->transaksi_data = $transaksis;
            $absensi->total_transaksi = $transaksis->count();
        }
        
        return view('admin.pages.absensi.index', [
            'title' => 'Absensi Karyawan',
            'absensis' => $absensis,
            'karyawans' => $karyawans,
            'tanggal' => $tanggal,
            'karyawanId' => $karyawanId
        ]);
    }

    public function create()
    {
        $karyawans = Karyawan::where('status', 'aktif')->get();
        
        return view('admin.pages.absensi.create', [
            'title' => 'Input Absensi Karyawan',
            'karyawans' => $karyawans
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date'
        ]);

        // Check if absensi already exists for this karyawan and tanggal
        $existing = Absensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->first();
        
        if ($existing) {
            return redirect()->route('admin.absensi', ['tanggal' => $request->tanggal])
                ->with('error', 'Absensi untuk karyawan ini pada tanggal tersebut sudah ada');
        }

        Absensi::create($request->all());
        
        return redirect()->route('admin.absensi', ['tanggal' => $request->tanggal])
            ->with('success', 'Absensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $absensi = Absensi::with(['karyawan', 'transaksis.layanan'])->findOrFail($id);
        $karyawans = Karyawan::where('status', 'aktif')->get();
        
        // Get treatment data
        $transaksis = Transaksi::with('layanan')
            ->where('karyawan_id', $absensi->karyawan_id)
            ->whereDate('tanggal', $absensi->tanggal)
            ->get();
        $absensi->transaksi_data = $transaksis;
        $absensi->total_transaksi = $transaksis->count();
        
        return view('admin.pages.absensi.edit', [
            'title' => 'Edit Absensi Karyawan',
            'absensi' => $absensi,
            'karyawans' => $karyawans
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date'
        ]);

        // Check if absensi already exists for this karyawan and tanggal (excluding current record)
        $existing = Absensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $request->tanggal)
            ->where('id', '!=', $id)
            ->first();
        
        if ($existing) {
            return redirect()->route('admin.absensi', ['tanggal' => $request->tanggal])
                ->with('error', 'Absensi untuk karyawan ini pada tanggal tersebut sudah ada');
        }

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());
        
        return redirect()->route('admin.absensi', ['tanggal' => $request->tanggal])
            ->with('success', 'Absensi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $tanggal = $absensi->tanggal;
        $absensi->delete();
        
        return redirect()->route('admin.absensi', ['tanggal' => $tanggal])
            ->with('success', 'Absensi berhasil dihapus');
    }
}

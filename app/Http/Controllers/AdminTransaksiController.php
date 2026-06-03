<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('layanan')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.transaksi.index', [
            'title' => 'Data Transaksi',
            'transaksis' => $transaksis
        ]);
    }

    public function pesananAktif(Request $request)
    {
        $date = $request->query('date', \Carbon\Carbon::today()->toDateString());

        $transaksis = Transaksi::with(['layanan', 'karyawan'])
            ->whereIn('status', ['pending', 'dikerjakan', 'selesai'])
            ->whereDate('tanggal', $date)
            ->orderBy('jam', 'asc')
            ->get();
            
        return view('admin.pages.transaksi.aktif', [
            'title' => 'Pesanan Aktif',
            'transaksis' => $transaksis,
            'selectedDate' => $date
        ]);
    }

    public function show(int $id)
    {
        $transaksi = Transaksi::with(['layanan', 'karyawan'])->findOrFail($id);
        return view('admin.pages.transaksi.show', [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi
        ]);
    }

   public function updateStatus(Request $request, int $id)
    {
        $transaksi = Transaksi::find($id);

        if ($request->has('status')) {
            $request->validate([
                'status' => 'required|in:pending,dikerjakan,selesai,dibatalkan'
            ]);

            if (empty($transaksi->karyawan_id)) {
                return redirect()->back()->with('error', 'Karyawan harus dipilih sebelum mengubah status pesanan.');
            }

            $transaksi->status = $request->status;
        }

        if ($request->has('status_pembayaran')) {
            $request->validate([
                'status_pembayaran' => 'required|in:belum_bayar,lunas'
            ]);

            $transaksi->status_pembayaran = $request->status_pembayaran;
        }

        if ($request->has('karyawan_id')) {
            $transaksi->karyawan_id = $request->karyawan_id;
        }

        $transaksi->save();

        \App\Models\ActivityLog::log('Update Transaksi', 'Mengubah transaksi #' . $transaksi->id . ' (Status: ' . $transaksi->status . ')');

        return redirect()->route('admin.transaksi')
            ->with('success', 'Transaksi berhasil diperbarui');
    }


}

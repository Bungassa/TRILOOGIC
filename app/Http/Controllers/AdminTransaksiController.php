<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('layanan')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.transaksi.index', ['transaksis' => $transaksis]);
    }

   public function updateStatus(Request $request, int $id)
    {
        $transaksi = Transaksi::find($id);

        if ($request->has('status')) {
            $request->validate([
                'status' => 'required|in:pending,dikerjakan,selesai'
            ]);

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

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'telepon' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required|in:pending,dikerjakan,selesai',
            'catatan' => 'nullable|string',
            'karyawan_id' => 'required',
        ]);

        // Get layanan to calculate total
        $layanan = \App\Models\Layanan::find($request->layanan_id);
        $totalHarga = $layanan->harga;

        // Add home service fee if location is rumah
        if ($request->lokasi === 'rumah') {
            $totalHarga += 20000;
        }

        // Simpan transaksi ke database
        $transaksi = Transaksi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'layanan_id' => $request->layanan_id,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'catatan' => $request->catatan,
            'total_harga' => $totalHarga,
            'status' => $request->status,
            'karyawan_id' => $request->karyawan_id,
        ]);

        \App\Models\ActivityLog::log('Tambah Transaksi', 'Menambah transaksi baru untuk ' . $request->nama);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan');
    }
}

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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,dikerjakan,selesai',
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return redirect()->route('admin.transaksi')->with('success', 'Status transaksi berhasil diperbarui');
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
        ]);

        // Get layanan to calculate total
        $layanan = \App\Models\Layanan::find($request->layanan_id);
        $totalHarga = $layanan->harga;

        // Add home service fee if location is rumah
        if ($request->lokasi === 'rumah') {
            $totalHarga += 20000;
        }

        // Simpan transaksi ke database
        Transaksi::create([
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
        ]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan');
    }
}

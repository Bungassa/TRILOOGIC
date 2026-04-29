<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $layanans = \App\Models\Layanan::take(4)->get();
        return view('index', ['layanans' => $layanans]);
    }

    public function service()
    {
        $layanans = \App\Models\Layanan::all();
        return view('service', ['layanans' => $layanans]);
    }

    public function pemesanan()
    {
        $layanans = \App\Models\Layanan::all();
        return view('pemesanan', ['layanans' => $layanans]);
    }

    public function submitpemesanan(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'telepon' => 'required|string|max:20',
            'layanan' => 'required|exists:layanans,id',
            'lokasi' => 'required|in:tempat,rumah',
            'alamat' => 'required_if:lokasi,rumah|string',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'catatan' => 'nullable|string',
        ]);

        // Get layanan to calculate total
        $layanan = \App\Models\Layanan::find($request->layanan);
        $totalHarga = $layanan->harga;

        // Add home service fee if location is rumah
        if ($request->lokasi === 'rumah') {
            $totalHarga += 20000;
        }

        // Simpan transaksi ke database
        \App\Models\Transaksi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'layanan_id' => $request->layanan,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'catatan' => $request->catatan,
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        return redirect()->route('pemesanan')->with('success', 'Pemesanan berhasil dikirim! Kami akan menghubungi Anda segera.');
    }

    public function pageView(Request $request)
    {
        if (view()->exists($request->path())) {
            $data = [];
            if ($request->path() === 'service') {
                $data['layanans'] = \App\Models\Layanan::all();
            } elseif ($request->path() === 'index') {
                $data['layanans'] = \App\Models\Layanan::take(4)->get();
            }
            return view($request->path(), $data);
        } else {
            abort(404);
        }
    }
}

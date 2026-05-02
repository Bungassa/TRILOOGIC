<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'rating' => 'required|integer|min:1|max:5',
            'pesan' => 'required|string|max:1000',
        ]);

        $transaksi = Transaksi::findOrFail($request->transaksi_id);

        // Pastikan transaksi milik user (via user_id atau telepon) dan statusnya selesai
        $isOwner = ($transaksi->user_id == Auth::id()) || ($transaksi->telepon == Auth::user()->phone);
        
        if (!$isOwner || $transaksi->status != 'selesai') {
            return back()->with('error', 'Anda tidak dapat memberikan testimoni untuk pesanan ini.');
        }

        // Hubungkan transaksi ke user jika belum terhubung
        if (!$transaksi->user_id) {
            $transaksi->user_id = Auth::id();
            $transaksi->save();
        }

        // Cek apakah sudah ada testimoni
        if ($transaksi->testimoni) {
            return back()->with('error', 'Anda sudah memberikan testimoni untuk pesanan ini.');
        }

        Testimoni::create([
            'user_id' => Auth::id(),
            'transaksi_id' => $request->transaksi_id,
            'rating' => $request->rating,
            'pesan' => $request->pesan,
        ]);

        return back()->with('success', 'Terima kasih atas testimoni Anda!');
    }
}

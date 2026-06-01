<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;

class AdminBedController extends Controller
{
    public function index()
    {
        // Get all transactions that currently occupy a bed
        $occupiedBeds = Transaksi::with(['layanan', 'karyawan'])
            ->whereNotNull('bed_id')
            ->whereIn('status', ['pending', 'dikerjakan'])
            ->get()
            ->keyBy('bed_id');

        // Get active transactions today that need a bed
        // We only consider transactions that are pending or dikerjakan, and are not yet assigned a bed
        $availableTransactions = Transaksi::with(['layanan', 'karyawan'])
            ->whereNull('bed_id')
            ->whereNotNull('karyawan_id')
            ->whereIn('status', ['pending', 'dikerjakan'])
            ->whereDate('tanggal', Carbon::today())
            ->orderBy('jam', 'asc')
            ->get();

        $maleTransactions = $availableTransactions->where('jenis_kelamin', 'L');
        $femaleTransactions = $availableTransactions->where('jenis_kelamin', 'P');

        return view('admin.pages.bed.index', [
            'title' => 'Manajemen Bed',
            'occupiedBeds' => $occupiedBeds,
            'maleTransactions' => $maleTransactions,
            'femaleTransactions' => $femaleTransactions
        ]);
    }

    public function assign(Request $request, string $bed_id)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id'
        ]);

        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        
        // Ensure the transaction matches the room gender (1-4 Male, 5-8 Female)
        $isMaleBed = $bed_id >= 1 && $bed_id <= 4;
        if (($isMaleBed && $transaksi->jenis_kelamin !== 'L') || (!$isMaleBed && $transaksi->jenis_kelamin !== 'P')) {
            return back()->with('error', 'Jenis kelamin pelanggan tidak sesuai dengan ruangan bed.');
        }

        // Ensure the bed is not already occupied
        $isOccupied = Transaksi::where('bed_id', $bed_id)->whereIn('status', ['pending', 'dikerjakan'])->exists();
        if ($isOccupied) {
            return back()->with('error', 'Bed sudah terisi.');
        }

        $transaksi->bed_id = $bed_id;
        // Optionally update status to dikerjakan if it's placed in a bed
        if ($transaksi->status == 'pending') {
            $transaksi->status = 'dikerjakan';
        }
        $transaksi->save();

        return back()->with('success', 'Pelanggan berhasil ditempatkan di bed.');
    }

    public function release(string $transaksi_id)
    {
        $transaksi = Transaksi::findOrFail($transaksi_id);
        $transaksi->bed_id = null;
        
        // When releasing bed, usually the status becomes selesai.
        // We can either set it here or just leave it for the admin to change from Data Transaksi.
        // Let's just remove the bed_id so it frees up the bed.
        $transaksi->save();

        return back()->with('success', 'Bed berhasil dikosongkan.');
    }

    public function complete(string $transaksi_id)
    {
        $transaksi = Transaksi::findOrFail($transaksi_id);
        $transaksi->bed_id = null;
        $transaksi->status = 'selesai';
        $transaksi->save();

        return back()->with('success', 'Treatment selesai. Bed berhasil dikosongkan.');
    }
}

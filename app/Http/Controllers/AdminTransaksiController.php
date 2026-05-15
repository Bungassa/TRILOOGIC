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

        // Automatically create payroll record if transaction is completed and paid
        if ($transaksi->status === 'selesai' && $transaksi->status_pembayaran === 'lunas' && $transaksi->karyawan_id) {
            \App\Models\Penggajian::updateOrCreate(
                ['transaksi_id' => $transaksi->id],
                [
                    'karyawan_id' => $transaksi->karyawan_id,
                    'layanan_id' => $transaksi->layanan_id,
                    'upah_karyawan' => $transaksi->total_harga / 2,
                    'pendapatan_owner' => $transaksi->total_harga / 2,
                    'status_pembayaran' => 'pending'
                ]
            );
        }

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
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'layanan_id' => $request->layanan_id,
            'lokasi' => 'tempat',
            'alamat' => null,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'catatan' => $request->catatan,
            'total_harga' => $totalHarga,
            'status' => 'pending',
            'karyawan_id' => $request->karyawan_id,
        ]);

        // Sync with Midtrans if status is pending
        if ($transaksi->status === 'pending') {
            \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
            \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => 'TRX-' . $transaksi->id . '-' . time(),
                    'gross_amount' => (int)$totalHarga,
                ],
                'customer_details' => [
                    'first_name' => $request->nama,
                    'phone' => $request->telepon,
                ],
                'item_details' => [
                    [
                        'id' => 'LYN-' . $layanan->id,
                        'price' => (int)$layanan->harga,
                        'quantity' => 1,
                        'name' => $layanan->nama,
                    ]
                ]
            ];

            if ($request->lokasi === 'rumah') {
                $params['item_details'][] = [
                    'id' => 'FEE-HOME',
                    'price' => 20000,
                    'quantity' => 1,
                    'name' => 'Ongkos Kirim (Home Service)',
                ];
            }

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $transaksi->snap_token = $snapToken;
                $transaksi->save();
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Midtrans Error in Admin Store: ' . $e->getMessage());
            }
        }

        \App\Models\ActivityLog::log('Tambah Transaksi', 'Menambah transaksi baru untuk ' . $request->nama);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan');
    }
}

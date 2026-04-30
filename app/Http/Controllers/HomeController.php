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
        \Illuminate\Support\Facades\Log::info('Submit pemesanan request received', $request->all());
        
        // Validasi input
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'telepon' => 'required|string|max:20',
                'layanan' => 'required|exists:layanans,id',
                'lokasi' => 'required|in:tempat,rumah',
                'alamat' => 'required_if:lokasi,rumah|nullable|string',
                'tanggal' => 'required|date|after_or_equal:today',
                'jam' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        $inputDate = $request->tanggal;
                        $today = date('Y-m-d');
                        if ($inputDate === $today) {
                            $inputTime = strtotime($value);
                            $now = time();
                            if ($inputTime < $now) {
                                $fail('Waktu pemesanan tidak boleh sebelum waktu saat ini untuk hari yang sama.');
                            }
                        }
                    },
                ],
                'catatan' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Illuminate\Support\Facades\Log::error('Validation failed', $e->errors());
            throw $e;
        }

        \Illuminate\Support\Facades\Log::info('Validation passed');

        // Get layanan to calculate total
        $layanan = \App\Models\Layanan::find($request->layanan);
        $totalHarga = $layanan->harga;

        // Add home service fee if location is rumah
        if ($request->lokasi === 'rumah') {
            $totalHarga += 20000;
        }

        // Simpan transaksi ke database
        $transaksi = \App\Models\Transaksi::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
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

        // Set konfigurasi Midtrans
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
                    'id' => $request->layanan,
                    'price' => (int)$totalHarga,
                    'quantity' => 1,
                    'name' => $layanan->nama . ($request->lokasi === 'rumah' ? ' (Home Service)' : ''),
                ]
            ]
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaksi->snap_token = $snapToken;
            $transaksi->save();
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Midtrans Error: ' . $e->getMessage());
        }

        return redirect()->route('pemesanan.pembayaran', ['id' => $transaksi->id])->with('success', 'Pemesanan berhasil dibuat! Silahkan lakukan pembayaran.');
    }

    public function pembayaran($id)
    {
        $transaksi = \App\Models\Transaksi::with('layanan')->findOrFail($id);
        return view('pembayaran', ['transaksi' => $transaksi]);
    }

    public function riwayat(Request $request)
    {
        $telepon = $request->get('telepon');
        $transaksis = null;

        if ($telepon) {
            $transaksis = \App\Models\Transaksi::where('telepon', $telepon)
                ->with('layanan')
                ->latest()
                ->get();
        }

        return view('riwayat', [
            'transaksis' => $transaksis,
            'telepon' => $telepon
        ]);
    }

    public function konfirmasiPembayaran($id)
    {
        $transaksi = \App\Models\Transaksi::findOrFail($id);
        $transaksi->status_pembayaran = 'lunas';
        $transaksi->save();

        return response()->json(['success' => true, 'message' => 'Pembayaran berhasil dikonfirmasi']);
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

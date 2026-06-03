<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $layanans = \App\Models\Layanan::take(4)->get();
        $testimonis = \App\Models\Testimoni::with('user', 'transaksi.layanan')->latest()->take(6)->get();
        
        $pendingTestimoniCount = 0;
        if (\Illuminate\Support\Facades\Auth::check()) {
            $pendingTestimoniCount = \App\Models\Transaksi::where('user_id', \Illuminate\Support\Facades\Auth::id())
                ->where('status', 'selesai')
                ->whereDoesntHave('testimoni')
                ->count();
        }

        $userName = \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->name : 'Guest';
        \App\Models\ActivityLog::log('Kunjungan', "$userName mengunjungi halaman Beranda");

        return view('index', [
            'layanans' => $layanans, 
            'testimonis' => $testimonis,
            'pendingTestimoniCount' => $pendingTestimoniCount
        ]);
    }

    public function service()
    {
        $userName = \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->name : 'Guest';
        \App\Models\ActivityLog::log('Kunjungan', "$userName mengunjungi halaman Layanan");

        $layanans = \App\Models\Layanan::all();
        return view('service', ['layanans' => $layanans]);
    }

    public function pemesanan()
    {
        // Check for pending testimonials
        $pendingTestimoni = \App\Models\Transaksi::where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->where('status', 'selesai')
            ->whereDoesntHave('testimoni')
            ->first();

        if ($pendingTestimoni) {
            return redirect()->route('profile', ['#orders'])->with('error', 'Wajib memberikan testimoni untuk pesanan sebelumnya sebelum membuat pesanan baru.');
        }

        \App\Models\ActivityLog::log('Kunjungan', \Illuminate\Support\Facades\Auth::user()->name . " mengunjungi halaman Pemesanan");

        $layanans = \App\Models\Layanan::all();
        return view('pemesanan', ['layanans' => $layanans]);
    }

    public function submitpemesanan(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Submit pemesanan request received', $request->all());

        // Check for pending testimonials again
        $pendingTestimoni = \App\Models\Transaksi::where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->where('status', 'selesai')
            ->whereDoesntHave('testimoni')
            ->first();

        if ($pendingTestimoni) {
            return redirect()->route('profile', ['#orders'])->with('error', 'Wajib memberikan testimoni untuk pesanan sebelumnya sebelum membuat pesanan baru.');
        }
        
        // Validasi input
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'telepon' => 'required|string|max:20',
                'layanan' => 'required|exists:layanans,id',
                'lokasi' => 'required|in:tempat,rumah',
                'alamat' => 'required_if:lokasi,rumah|nullable|string',
                'lat' => 'nullable|numeric',
                'lng' => 'nullable|numeric',
                'tanggal' => 'required|date|after_or_equal:today',
                'jam' => [
                    'required',
                    function ($attribute, $value, $fail) use ($request) {
                        $inputTime = $value;
                        if ($inputTime < '09:00' || $inputTime > '23:00') {
                            $fail('Jam operasional kami adalah 09:00 - 23:00.');
                            return;
                        }

                        $inputDate = $request->tanggal;
                        $today = date('Y-m-d');
                        if ($inputDate === $today) {
                            $now = date('H:i');
                            if ($inputTime < $now) {
                                $fail('Waktu pemesanan tidak boleh sebelum waktu saat ini.');
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

        // Cek kapasitas bed (Maksimal 4 per jenis kelamin yang sedang aktif/belum selesai)
        $countBed = \App\Models\Transaksi::where('tanggal', $request->tanggal)
            ->where('jenis_kelamin', $request->jenis_kelamin)
            ->whereNotIn('status', ['dibatalkan', 'selesai'])
            ->whereNotNull('bed_id')
            ->count();

        if ($countBed >= 4) {
            return back()->withInput()->with('error', 'Layanan sedang penuh untuk jadwal tersebut. Masih ada bed kosong di waktu lain.');
        }

        // Get layanan to calculate total
        $layanan = \App\Models\Layanan::find($request->layanan);
        $totalHarga = $layanan->harga;

        // Add home service fee if location is rumah
        if ($request->lokasi === 'rumah') {
            $totalHarga += 20000;
        }

        // Simpan transaksi ke database
        $transaksi = \App\Models\Transaksi::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'layanan_id' => $request->layanan,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'lat' => $request->lat,
            'lng' => $request->lng,
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

        $itemDetails = [
            [
                'id' => 'LYN-' . $layanan->id,
                'price' => (int)$layanan->harga,
                'quantity' => 1,
                'name' => $layanan->nama,
            ]
        ];

        if ($request->lokasi === 'rumah') {
            $itemDetails[] = [
                'id' => 'FEE-HOME',
                'price' => 20000,
                'quantity' => 1,
                'name' => 'Ongkos Kirim (Home Service)',
            ];
        }

        $params = [
            'transaction_details' => [
                'order_id' => 'TRX-' . $transaksi->id . '-' . time(),
                'gross_amount' => (int)$totalHarga,
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'phone' => $request->telepon,
            ],
            'item_details' => $itemDetails
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

    public function pembayaran(int $id)
    {
        $transaksi = \App\Models\Transaksi::with('layanan')->findOrFail($id);
        return view('pembayaran', ['transaksi' => $transaksi]);
    }



    public function konfirmasiPembayaran(int $id)
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

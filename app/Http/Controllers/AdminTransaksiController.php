<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('layanan')->orderBy('created_at', 'desc')->get();
        $layanans = \App\Models\Layanan::all();
        $karyawans = \App\Models\Karyawan::whereDoesntHave('transaksis', function ($query) {
            $query->whereIn('status', ['pending', 'dikerjakan'])
                ->where('status_pembayaran', 'lunas');
        })->get();
        $users = \App\Models\User::where('role', 'user')->get();

        return view('admin.pages.transaksi.index', [
            'title' => 'Data Transaksi',
            'transaksis' => $transaksis,
            'layanans' => $layanans,
            'karyawans' => $karyawans,
            'users' => $users
        ]);
    }

    public function pesananAktif(Request $request)
    {
        $date = $request->query('date', \Carbon\Carbon::today()->toDateString());


        $transaksis = Transaksi::with(['layanan', 'karyawan'])
            ->whereIn('status', ['pending', 'dikerjakan', 'selesai'])
            ->where('status_pembayaran', 'lunas')
            ->whereDate('tanggal', $date)
            ->orderBy('jam', 'asc')
            ->get();
        $layanans = \App\Models\Layanan::all();
        $karyawans = \App\Models\Karyawan::all();

        return view('admin.pages.pesanan.aktif', [
            'title' => 'Pesanan Aktif',
            'transaksis' => $transaksis,
            'selectedDate' => $date,
            'layanans' => $layanans,
            'karyawans' => $karyawans
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
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'telepon' => 'required|string|max:20',
            'layanan_id' => 'required|exists:layanans,id',
            'lokasi' => 'required|in:tempat,rumah',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $inputTime = $value;
                    if ($inputTime < '09:00' || $inputTime > '23:00') {
                        $fail('Jam operasional adalah 09:00 - 23:00.');
                        return;
                    }

                    $inputDate = $request->tanggal;
                    $today = date('Y-m-d');
                    if ($inputDate === $today) {
                        $now = date('H:i');
                        if ($inputTime < $now) {
                            $fail('Waktu pengerjaan tidak boleh sebelum waktu saat ini.');
                        }
                    }
                },
            ],
            'catatan' => 'nullable|string',
            'karyawan_id' => 'required|exists:karyawans,id',
        ]);

        // Get layanan to calculate total
        $layanan = \App\Models\Layanan::find($request->layanan_id);
        $totalHarga = $layanan->harga;

        // Simpan transaksi ke database
        $transaksi = Transaksi::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'layanan_id' => $request->layanan_id,
            'lokasi' => $request->lokasi ?? 'tempat',
            'alamat' => $request->alamat ?? null,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'catatan' => $request->catatan,
            'total_harga' => $totalHarga,
            'status' => 'pending',
            'karyawan_id' => $request->karyawan_id,
            'status_pembayaran' => 'lunas',
        ]);

        // Sync with Midtrans if status is pending and not lunas
        if ($transaksi->status === 'pending' && $transaksi->status_pembayaran !== 'lunas') {
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

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan');
    }
}

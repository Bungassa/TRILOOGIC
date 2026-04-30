<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');

        try {
            $notification = new Notification();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }

        $order_id_raw = $notification->order_id;
        // order_id format: TRX-{id}-{timestamp}
        $parts = explode('-', $order_id_raw);
        $id = $parts[1];

        $transaksi = Transaksi::findOrFail($id);

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaksi->status_pembayaran = 'belum_bayar';
                } else {
                    $transaksi->status_pembayaran = 'lunas';
                }
            }
        } else if ($transaction == 'settlement') {
            $transaksi->status_pembayaran = 'lunas';
        } else if ($transaction == 'pending') {
            $transaksi->status_pembayaran = 'belum_bayar';
        } else if ($transaction == 'deny') {
            $transaksi->status_pembayaran = 'belum_bayar';
        } else if ($transaction == 'expire') {
            $transaksi->status_pembayaran = 'belum_bayar';
        } else if ($transaction == 'cancel') {
            $transaksi->status_pembayaran = 'belum_bayar';
        }

        $transaksi->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Notification processed'
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'telepon',
        'layanan_id',
        'lokasi',
        'alamat',
        'lat',
        'lng',
        'tanggal',
        'jam',
        'catatan',
        'total_harga',
        'status',
        'status_pembayaran',
        'snap_token',
        'karyawan_id',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function testimoni()
    {
        return $this->hasOne(Testimoni::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    protected static function booted()
    {
        static::saved(function ($transaksi) {
            // Automatically create/update payroll record if transaction is completed and paid
            if ($transaksi->status === 'selesai' && $transaksi->status_pembayaran === 'lunas' && $transaksi->karyawan_id) {
                // Potong pajak 10.000 untuk layanan Full Body (ID 1 sampai 5)
                $layananKenaPajak = [1, 2, 3, 4, 5];
                $hargaBersih = $transaksi->total_harga;
                
                if (in_array($transaksi->layanan_id, $layananKenaPajak)) {
                    $hargaBersih -= 10000;
                }

                \App\Models\Penggajian::updateOrCreate(
                    ['transaksi_id' => $transaksi->id],
                    [
                        'karyawan_id' => $transaksi->karyawan_id,
                        'layanan_id' => $transaksi->layanan_id,
                        'upah_karyawan' => $hargaBersih / 2,
                        'pendapatan_owner' => $hargaBersih / 2,
                        'status_pembayaran' => 'pending'
                    ]
                );
            }
        });
    }

    public static function isKapasitasPenuh($tanggal, $jam, $durasi, $jenis_kelamin)
    {
        $new_start = \Carbon\Carbon::parse($jam);
        $new_end = $new_start->copy()->addMinutes($durasi);

        $overlapping = self::with('layanan')->where('tanggal', $tanggal)
            ->where('jenis_kelamin', $jenis_kelamin)
            ->whereNotIn('status', ['dibatalkan', 'selesai'])
            ->get()
            ->filter(function($trx) use ($new_start, $new_end) {
                $start = \Carbon\Carbon::parse($trx->jam);
                $trx_durasi = $trx->layanan->durasi ?? 60;
                $end = $start->copy()->addMinutes($trx_durasi);
                
                return $start < $new_end && $new_start < $end;
            });

        $max_concurrent = 0;
        for ($t = $new_start->copy(); $t < $new_end; $t->addMinute()) {
            $concurrent = 0;
            foreach ($overlapping as $trx) {
                $start = \Carbon\Carbon::parse($trx->jam);
                $end = $start->copy()->addMinutes($trx->layanan->durasi ?? 60);
                if ($t >= $start && $t < $end) {
                    $concurrent++;
                }
            }
            if ($concurrent > $max_concurrent) {
                $max_concurrent = $concurrent;
            }
        }

        return $max_concurrent >= 4;
    }

    public static function isKaryawanBentrok($tanggal, $jam, $durasi, $karyawan_id, $ignore_transaksi_id = null)
    {
        if (!$karyawan_id) return false;
        
        $new_start = \Carbon\Carbon::parse($jam);
        $new_end = $new_start->copy()->addMinutes($durasi);

        $query = self::with('layanan')->where('tanggal', $tanggal)
            ->where('karyawan_id', $karyawan_id)
            ->whereNotIn('status', ['dibatalkan', 'selesai']);
            
        if ($ignore_transaksi_id) {
            $query->where('id', '!=', $ignore_transaksi_id);
        }

        $overlapping = $query->get()
            ->filter(function($trx) use ($new_start, $new_end) {
                $start = \Carbon\Carbon::parse($trx->jam);
                $trx_durasi = $trx->layanan->durasi ?? 60;
                $end = $start->copy()->addMinutes($trx_durasi);
                
                return $start < $new_end && $new_start < $end;
            });
            
        return $overlapping->count() > 0;
    }
}

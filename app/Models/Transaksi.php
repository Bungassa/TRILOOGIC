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
}

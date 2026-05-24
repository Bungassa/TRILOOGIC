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
        });
    }
}

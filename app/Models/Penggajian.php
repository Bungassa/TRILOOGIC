<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'layanan_id',
        'transaksi_id',
        'upah_karyawan',
        'pendapatan_owner',
        'status_pembayaran',
        'tanggal_bayar',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}

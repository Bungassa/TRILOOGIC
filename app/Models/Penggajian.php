<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $fillable = [
        'karyawan_id', 'bulan', 'tahun', 'gaji_pokok', 'bonus', 'potongan', 'total_gaji', 'status_pembayaran', 'tanggal_bayar'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}

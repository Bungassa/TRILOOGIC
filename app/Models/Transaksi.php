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
        'tanggal',
        'jam',
        'catatan',
        'total_harga',
        'status',
        'status_pembayaran',
        'snap_token',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function testimoni()
    {
        return $this->hasOne(Testimoni::class);
    }
}

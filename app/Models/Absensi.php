<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'tanggal'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'karyawan_id', 'karyawan_id')->whereDate('tanggal', $this->tanggal);
    }
}

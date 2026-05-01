<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama', 'gaji_pokok', 'tanggal', 'terapi_yang_dilakukan', 'status'];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function penggajians()
    {
        return $this->hasMany(Penggajian::class);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawans = \App\Models\Karyawan::all();

        foreach ($karyawans as $k) {
            \App\Models\Penggajian::create([
                'karyawan_id' => $k->id,
                'bulan' => 'April',
                'tahun' => '2026',
                'gaji_pokok' => 2000000,
                'bonus' => 500000,
                'potongan' => 100000,
                'total_gaji' => 2400000,
                'status_pembayaran' => 'dibayar',
                'tanggal_bayar' => now(),
            ]);
        }
    }
}

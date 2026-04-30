<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawans = [
            [
                'nama' => 'Andi Wijaya',
                'tanggal' => '2023-01-15',
                'terapi_yang_dilakukan' => 'Refleksi, Massage Full Body',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Sinta Permata',
                'tanggal' => '2023-05-20',
                'terapi_yang_dilakukan' => 'Totok Wajah, Scrub, Massage',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Riko Kurniawan',
                'tanggal' => '2024-02-10',
                'terapi_yang_dilakukan' => 'Refleksi, Kerokan, Bekam',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Maya Sari',
                'tanggal' => '2023-11-05',
                'terapi_yang_dilakukan' => 'Massage Full Body, Lulur',
                'status' => 'aktif',
            ],
        ];

        foreach ($karyawans as $karyawan) {
            \App\Models\Karyawan::create($karyawan);
        }
    }
}

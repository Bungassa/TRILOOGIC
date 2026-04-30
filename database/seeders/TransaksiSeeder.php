<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\Layanan;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksis = [
            [
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'telepon' => '081234567890',
                'layanan_id' => 1, // Full Body Reflexyologi & Massage (60 menit)
                'lokasi' => 'tempat',
                'alamat' => null,
                'tanggal' => Carbon::now()->addDays(1)->format('Y-m-d'),
                'jam' => '10:00:00',
                'catatan' => 'Mohon dikerjakan oleh terapis laki-laki',
                'total_harga' => 80000,
                'status' => 'pending',
            ],
            [
                'nama' => 'Siti Aminah',
                'jenis_kelamin' => 'P',
                'telepon' => '082198765432',
                'layanan_id' => 3, // Full Body Massage + Totok Wajah
                'lokasi' => 'rumah',
                'alamat' => 'Jl. Merdeka No. 123, Subang',
                'tanggal' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'jam' => '14:00:00',
                'catatan' => 'Rumah warna hijau',
                'total_harga' => 110000,
                'status' => 'pending',
            ],
            [
                'nama' => 'Agus Hermawan',
                'jenis_kelamin' => 'L',
                'telepon' => '085678901234',
                'layanan_id' => 7, // Back Massage
                'lokasi' => 'tempat',
                'alamat' => null,
                'tanggal' => Carbon::now()->subDays(1)->format('Y-m-d'),
                'jam' => '16:00:00',
                'catatan' => null,
                'total_harga' => 40000,
                'status' => 'selesai',
            ],
            [
                'nama' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'telepon' => '087812345678',
                'layanan_id' => 5, // Full Body Massage + Totok Wajah + Scrub
                'lokasi' => 'tempat',
                'alamat' => null,
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jam' => '11:00:00',
                'catatan' => 'Ingin terapis yang sudah senior',
                'total_harga' => 140000,
                'status' => 'dikerjakan',
            ],
            [
                'nama' => 'Rizky Pratama',
                'jenis_kelamin' => 'L',
                'telepon' => '081299887766',
                'layanan_id' => 11, // Kerokan
                'lokasi' => 'rumah',
                'alamat' => 'Perumahan Asri Blok C4, Subang',
                'tanggal' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'jam' => '19:00:00',
                'catatan' => 'Sedang masuk angin parah',
                'total_harga' => 20000,
                'status' => 'pending',
            ],
        ];

        foreach ($transaksis as $transaksi) {
            Transaksi::create($transaksi);
        }
    }
}

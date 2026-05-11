<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\Karyawan;
use App\Models\Layanan;
use Carbon\Carbon;

class TransaksiTodaySeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = Karyawan::all();
        $layanans = Layanan::all();

        if ($karyawans->isEmpty() || $layanans->isEmpty()) {
            return;
        }

        $names = ['Budi', 'Siti', 'Agus', 'Dewi', 'Joko'];
        $today = Carbon::today()->toDateString();

        foreach ($karyawans as $index => $karyawan) {
            // Buat 1-2 transaksi per karyawan untuk hari ini
            for ($i = 0; $i < rand(1, 2); $i++) {
                $layanan = $layanans->random();
                
                Transaksi::create([
                    'nama' => $names[array_rand($names)] . ' ' . ($index + 1),
                    'jenis_kelamin' => rand(0, 1) ? 'L' : 'P',
                    'telepon' => '081234567' . rand(100, 999),
                    'layanan_id' => $layanan->id,
                    'lokasi' => 'tempat',
                    'alamat' => null,
                    'tanggal' => $today,
                    'jam' => '1' . rand(0, 9) . ':00',
                    'catatan' => 'Seeded for testing absensi',
                    'total_harga' => $layanan->harga,
                    'status' => 'selesai',
                    'status_pembayaran' => 'lunas',
                    'karyawan_id' => $karyawan->id,
                ]);
            }
        }
    }
}

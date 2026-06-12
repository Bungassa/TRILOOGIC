<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class BookingTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $besok = date('Y-m-d', strtotime('+1 day'));

        for ($i = 1; $i <= 4; $i++) {
            Transaksi::create([
                'user_id' => 1, // Assuming user 1 exists
                'nama' => 'Test Full Booking ' . $i,
                'jenis_kelamin' => 'L', // Ganti P jika testing akun P
                'telepon' => '08123456789' . $i,
                'layanan_id' => 1,
                'lokasi' => 'tempat',
                'tanggal' => $besok,
                'jam' => '16:00',
                'total_harga' => 50000,
                'status' => 'pending',
            ]);
        }
    }
}

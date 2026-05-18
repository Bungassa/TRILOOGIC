<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\Karyawan;
use App\Models\Layanan;
use Carbon\Carbon;

class PayrollHistorySeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = Karyawan::all();
        $layanans = Layanan::all();
        $users = \App\Models\User::where('role', 'user')->get();

        if ($karyawans->isEmpty() || $layanans->isEmpty()) {
            return;
        }

        $lastMonth = Carbon::now()->subMonth();
        
        for ($i = 0; $i < 5; $i++) {
            $layanan = $layanans->random();
            $karyawan = $karyawans->random();
            $user = $users->isNotEmpty() ? $users->random() : null;
            
            Transaksi::create([
                'user_id' => $user ? $user->id : null,
                'nama' => $user ? $user->name : 'History User ' . ($i + 1),
                'jenis_kelamin' => $user ? ($user->jenis_kelamin ?? (rand(0, 1) ? 'L' : 'P')) : (rand(0, 1) ? 'L' : 'P'),
                'telepon' => $user ? ($user->phone ?? '08123456789') : '08' . rand(100000000, 999999999),
                'layanan_id' => $layanan->id,
                'lokasi' => 'tempat',
                'tanggal' => $lastMonth->format('Y-m-d'),
                'jam' => '10:00',
                'total_harga' => $layanan->harga,
                'status' => 'selesai',
                'status_pembayaran' => 'lunas',
                'karyawan_id' => $karyawan->id,
            ]);
        }
    }
}

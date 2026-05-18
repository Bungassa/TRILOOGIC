<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Penggajian;
use Carbon\Carbon;

class PayrollDummySeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = Karyawan::all();
        $layanans = Layanan::all();
        $users = \App\Models\User::where('role', 'user')->get();

        if ($karyawans->isEmpty() || $layanans->isEmpty()) {
            $this->command->info('Please seed Karyawans and Layanans first!');
            return;
        }

        // Create 10 transactions for the current month
        for ($i = 0; $i < 10; $i++) {
            $layanan = $layanans->random();
            $karyawan = $karyawans->random();
            $user = $users->isNotEmpty() ? $users->random() : null;
            
            $totalHarga = $layanan->harga;
            
            Transaksi::create([
                'user_id' => $user ? $user->id : null,
                'nama' => $user ? $user->name : 'Customer Dummy ' . ($i + 1),
                'jenis_kelamin' => $user ? ($user->jenis_kelamin ?? (rand(0, 1) ? 'L' : 'P')) : (rand(0, 1) ? 'L' : 'P'),
                'telepon' => $user ? ($user->phone ?? '08123456789') : '08' . rand(100000000, 999999999),
                'layanan_id' => $layanan->id,
                'lokasi' => 'tempat',
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jam' => rand(9, 21) . ':00',
                'total_harga' => $totalHarga,
                'status' => 'selesai',
                'status_pembayaran' => 'lunas',
                'karyawan_id' => $karyawan->id,
            ]);
        }

        $this->command->info('Successfully created 10 dummy payroll records using user data for the current month.');
    }
}

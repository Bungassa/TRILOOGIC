<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun admin
        User::create([
            'name' => 'Admin Ekky',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Membuat akun owner
        User::create([
            'name' => 'Owner Ekky',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner123'),
            'role' => 'owner',
        ]);

        $this->command->info('Admin and Owner accounts created successfully!');
        $this->command->info('Admin -> Email: admin@gmail.com | Password: admin123');
        $this->command->info('Owner -> Email: owner@gmail.com | Password: owner123');
    }
}

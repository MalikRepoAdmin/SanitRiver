<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Kita tambahkan username dan password dummy untuk kelima admin
        $admins = [
            [
                'nama_admin' => 'Budi Santoso',
                'username' => 'budi123',
                'password' => Hash::make('password123') // Di-encrypt biar aman
            ],
            [
                'nama_admin' => 'Siti Aminah',
                'username' => 'siti123',
                'password' => Hash::make('password123')
            ],
            [
                'nama_admin' => 'Ahmad Fauzi',
                'username' => 'ahmad123',
                'password' => Hash::make('password123')
            ],
            [
                'nama_admin' => 'Dewi Lestari',
                'username' => 'dewi123',
                'password' => Hash::make('password123')
            ],
            [
                'nama_admin' => 'Rian Hidayat',
                'username' => 'rian123',
                'password' => Hash::make('password123')
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
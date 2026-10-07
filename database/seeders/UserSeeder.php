<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'budi.santoso@example.com',
                'username' => 'budis',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Budi Santoso',
                'tgl_lahir' => '1995-05-15',
                'bio' => 'Pengembang perangkat lunak yang berdomisili di Jakarta.',
                'pekerjaan' => 'Software Engineer',
                'domisili' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'siti.aminah@example.com',
                'username' => 'sitia',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Siti Aminah',
                'tgl_lahir' => '1998-08-20',
                'bio' => 'Spesialis pemasaran digital dan pembuat konten.',
                'pekerjaan' => 'Digital Marketer',
                'domisili' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'dewi.lestari@example.com',
                'username' => 'dewil',
                'password' => Hash::make('password123'),
                'nama_lengkap' => 'Dewi Lestari',
                'tgl_lahir' => '1992-12-10',
                'bio' => 'Perancang antarmuka pengguna berbasis di Surabaya.',
                'pekerjaan' => 'UI/UX Designer',
                'domisili' => 'Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
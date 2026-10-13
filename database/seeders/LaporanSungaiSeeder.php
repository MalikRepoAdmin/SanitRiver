<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Sungai;

class LaporanSungaiSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('user_id')->toArray();
        if (empty($userIds)) {
            $this->command->warn('Tabel users kosong. Buat user default terlebih dahulu.');
            return;
        }

        $sungaiIds = Sungai::pluck('sungai_id')->toArray();
        if (empty($sungaiIds)) {
            $this->command->warn('Tabel sungais kosong. Jalankan SungaiSeeder terlebih dahulu.');
            return;
        }

        // 20 data laporan
        $statuses = [
            'Bersih',
            'Cukup Bersih',
            'Kurang Bersih',
            'Tercemar',
            'Bersih',
            'Cukup Bersih',
            'Tercemar',
            'Kurang Bersih',
            'Bersih',
            'Cukup Bersih',
            'Tercemar',
            'Kurang Bersih',
            'Bersih',
            'Cukup Bersih',
            'Tercemar',
            'Kurang Bersih',
            'Bersih',
            'Cukup Bersih',
            'Tercemar',
            'Kurang Bersih',
        ];

        $inserted = 0;
        foreach ($statuses as $index => $status) {
            $userId   = $userIds[$index % count($userIds)];
            $sungaiId = $sungaiIds[$index % count($sungaiIds)];

            // Hindari duplikat kombinasi user + sungai
            $exists = DB::table('laporan_sungais')
                ->where('user_id', $userId)
                ->where('sungai_id', $sungaiId)
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table('laporan_sungais')->insert([
                'user_id'    => $userId,
                'sungai_id'  => $sungaiId,
                'status'     => $status,
                'created_at' => now()->subMinutes(($index + 1) * 15),
                'updated_at' => now()->subMinutes(($index + 1) * 15),
            ]);

            $inserted++;
        }

        $this->command->info("Seeder laporan_sungais selesai: {$inserted} data dimasukkan.");
    }
}
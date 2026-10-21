<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeliharaan_sungais', function (Blueprint $table) {
            $table->id('pemeliharaan_id');
            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->nullOnDelete();
            $table->foreignId('sungai_id')->constrained('sungais', 'sungai_id')->cascadeOnDelete();
            $table->string('judul', 150);
            $table->enum('jenis_kegiatan', [
                'Pembersihan',
                'Penyisiran Sampah',
                'Pengecekan Kualitas Air',
                'Penggalian Dan Pembersihan',
                'Tebing',
                'Perbaikan Saluran',
                'Lainnya',
            ]);
            $table->date('tanggal');
            $table->enum('status', [
                'Direncanakan',
                'Sedang Dilakukan',
                'Selesai',
                'Dibatalkan',
            ])->default('Direncanakan');
            $table->text('deskripsi')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_sungais');
    }
};

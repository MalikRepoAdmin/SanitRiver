<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usulan_infrastrukturs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('lokasi_usulan');
            $table->string('jenis_infrastruktur'); 
            $table->text('alasan_kebutuhan');
            $table->enum('tingkat_urgensi', ['Tinggi', 'Sedang', 'Rendah'])->default('Sedang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan_infrastrukturs');
    }
};

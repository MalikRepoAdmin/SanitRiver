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
    Schema::create('tindak_lanjuts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('laporansungai_id'); 
        $table->foreign('laporansungai_id')->references('laporansungai_id')->on('laporan_sungais')->onDelete('cascade');
        
        $table->string('petugas');
        $table->text('tindakan');
        $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
        $table->date('tanggal_tindak_lanjut');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindak_lanjuts');
    }
};

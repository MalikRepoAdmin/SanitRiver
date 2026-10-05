<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the river reports table.
     */
    public function up(): void
    {
        Schema::create('laporan_sungais', function (Blueprint $table) {
            $table->id('laporansungai_id');

            $table->foreignId('user_id')
                ->constrained(
                    table: 'users',
                    column: 'user_id'
                )
                ->restrictOnDelete();

            $table->foreignId('sungai_id')
                ->constrained(
                    table: 'sungais',
                    column: 'sungai_id'
                )
                ->restrictOnDelete();

            $table->enum('status', [
                'Bersih',
                'Cukup Bersih',
                'Kurang Bersih',
                'Tercemar',
            ]);

            $table->enum('persetujuan', [
                'disetujui',
                'menunggu',
                'ditolak',
            ])->default('menunggu');

            $table->timestamps();

            /*
             * Optimize queries that retrieve reports
             * belonging to a particular user.
             */
            $table->index('user_id');

            /*
             * Optimize queries that retrieve reports
             * belonging to a particular river.
             */
            $table->index('sungai_id');

            /*
             * Optimize filtering reports by approval status.
             */
            $table->index('persetujuan');
        });
    }

    /**
     * Drop the river reports table.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_sungais');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the rivers table.
     */
    public function up(): void
    {
        Schema::create('sungais', function (Blueprint $table) {
            $table->id('sungai_id');

            $table->string('nama_sungai', 255);
            $table->text('alamat');

            $table->enum('status', [
                'Bersih',
                'Cukup Bersih',
                'Kurang Bersih',
                'Tercemar',
            ])->default('Bersih');

            $table->string('tipe_sungai', 255)->nullable();

            /*
             * Store river geometry using the WGS 84
             * coordinate reference system (SRID 4326).
             *
             * Geometry is nullable to allow a river record
             * to be created before its geographic data
             * has been provided.
             */
            $table->geometry(
                'geometri',
                subtype: 'point',
                srid: 4326
            )->nullable();

            $table->timestamps();
        });
    }

    /**
     * Drop the rivers table.
     */
    public function down(): void
    {
        Schema::dropIfExists('sungais');
    }
};
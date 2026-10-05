<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the river images table.
     */
    public function up(): void
    {
        Schema::create('gambar_sungais', function (Blueprint $table) {
            $table->id('gambarsungai_id');

            $table->string('file_path', 2048);

            /*
             * Creates:
             * - imageable_id
             * - imageable_type
             *
             * These columns allow images to belong
             * to different Eloquent models.
             */
            $table->morphs('imageable');

            $table->timestamps();
        });
    }

    /**
     * Drop the river images table.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_sungais');
    }
};
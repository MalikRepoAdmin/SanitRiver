<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sungais', function (Blueprint $table) {

            DB::statement("
                ALTER TABLE sungais
                MODIFY COLUMN status ENUM(
                    'Belum Terlapor',
                    'Bersih',
                    'Cukup Bersih',
                    'Kurang Bersih',
                    'Tercemar'
                )
                NOT NULL
                DEFAULT 'Belum Terlapor'
            ");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sungais', function (Blueprint $table) {
            DB::statement("
                ALTER TABLE sungais
                MODIFY COLUMN status ENUM(
                    'Bersih',
                    'Cukup Bersih',
                    'Kurang Bersih',
                    'Tercemar'
                )
                NOT NULL
                DEFAULT 'Bersih'
            ");
        });
    }
};

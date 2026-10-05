<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the administrators table.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');

            $table->string('username', 255)->unique();
            $table->string('password');

            $table->timestamps();
        });
    }

    /**
     * Drop the administrators table.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
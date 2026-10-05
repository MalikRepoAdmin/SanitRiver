<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the users table.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');

            $table->string('username', 255)->unique();
            $table->string('password');

            $table->string('nama_lengkap', 255);
            $table->text('bio')->nullable();
            $table->string('email', 255)->unique();

            $table->date('tgl_lahir')->nullable();
            $table->string('pekerjaan', 255)->nullable();
            $table->text('domisili')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Drop the users table.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
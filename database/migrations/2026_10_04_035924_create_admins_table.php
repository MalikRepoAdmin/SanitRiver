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
            $table->string('email', 255)->unique();
            $table->string('password');

            $table->timestamps();
        });

        Schema::create('admin_password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
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
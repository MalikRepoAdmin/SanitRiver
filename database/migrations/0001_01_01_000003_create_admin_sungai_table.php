<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the administrator-river pivot table.
     */
    public function up(): void
    {
        Schema::create('admin_sungai', function (Blueprint $table) {
            $table->foreignId('admin_id')
                ->constrained(
                    table: 'admins',
                    column: 'admin_id'
                )
                ->cascadeOnDelete();

            $table->foreignId('sungai_id')
                ->constrained(
                    table: 'sungais',
                    column: 'sungai_id'
                )
                ->cascadeOnDelete();

            /*
             * Prevent duplicate assignments of the same
             * river to the same administrator.
             */
            $table->primary(['admin_id', 'sungai_id']);

            $table->timestamps();
        });
    }

    /**
     * Drop the administrator-river pivot table.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_sungai');
    }
};
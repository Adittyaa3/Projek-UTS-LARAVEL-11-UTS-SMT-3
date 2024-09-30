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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nama');
            $table->string('nim');
            $table->string('angkatan');
            $table->string('nomor_hp');
            $table->timestamp('created_at')->nullable();;
            $table->timestamp('updated_at')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};

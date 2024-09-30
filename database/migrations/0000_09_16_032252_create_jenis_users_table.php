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
        Schema::create('jenis_users', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_user'); // Nama jenis user
            $table->string('create_by', 30)->nullable();
            $table->char('delete_mark', 1)->default('0')->nullable();
            $table->string('update_by', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_users');
    }
};

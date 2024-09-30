<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id('message_id');
            $table->unsignedBigInteger('user_id');  // Relasi ke tabel users
            $table->string('sender', 30);
            $table->string('message_reference', 30)->nullable();
            $table->string('subject', 300);
            $table->text('message_text');
            $table->string('message_status', 30);
            $table->unsignedBigInteger('no_mks');  // Foreign key ke kategori pesan
            $table->string('create_by', 30);
            $table->timestamp('create_date')->useCurrent();
            $table->boolean('delete_mark')->default(false);
            $table->string('update_by', 30)->nullable();
            $table->timestamp('update_date')->nullable();
    
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('no_mks')->references('no_msk')->on('message_kategories')->onDelete('cascade');  // Perbaikan penulisan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

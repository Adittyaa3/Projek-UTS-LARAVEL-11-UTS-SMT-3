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
        Schema::create('message_dokumens', function (Blueprint $table) {
            $table->id('no_mdok');
            $table->string('file', 200);
            $table->string('description', 150);
            $table->unsignedBigInteger('message_id');
            $table->string('create_by', 30);
            $table->timestamp('create_date')->useCurrent();
            $table->boolean('delete_mark')->default(false);
            $table->string('update_by', 30)->nullable();
            $table->timestamp('update_date')->nullable();
    
            // Foreign key ke tabel messages
            $table->foreign('message_id')->references('message_id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_dokumens');  // Perbaiki agar nama tabel sesuai
    }
};

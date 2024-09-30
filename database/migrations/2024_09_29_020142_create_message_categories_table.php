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
        Schema::create('message_kategories', function (Blueprint $table) {
            $table->id('no_mks');
            $table->string('description', 50);
            $table->string('create_by', 30);
            $table->timestamp('create_date')->useCurrent();
            $table->boolean('delete_mark')->default(false);
            $table->string('update_by', 30)->nullable();
            $table->timestamp('update_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_kategories');  // Perbaiki agar nama tabel sesuai
    }
};

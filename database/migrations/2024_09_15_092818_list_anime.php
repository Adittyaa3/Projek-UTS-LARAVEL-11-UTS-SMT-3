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
        Schema::create('anime', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->text( 'number_of_episodes');
            $table->timestamp('created_at')->nullable();;
            $table->timestamp('updated_at')->nullable();;
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime');
    }
};

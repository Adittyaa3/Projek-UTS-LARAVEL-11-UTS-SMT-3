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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('ID_level')->nullable();
            // $table->foreign('ID_level')->references('ID_level')->on('menu_levels')->onDelete('cascade')->onUpdate('cascade');
            $table->string('menu_name');
            $table->string('menu_link');
            $table->string('menu_icon');
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
        Schema::dropIfExists('menus');
    }
};

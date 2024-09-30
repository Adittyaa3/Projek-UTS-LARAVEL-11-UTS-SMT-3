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
        // Schema::create('setting_menu_users', function (Blueprint $table) {
        //     $table->id('ID_setting');
        //     $table->unsignedBigInteger(column: 'ID_jenis_user');
        //     $table->foreign('ID_jenis_user')->references('id')->on('jenis_users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->unsignedBigInteger('ID_menu');
        //     $table->foreign('ID_menu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
        //     $table->timestamps();
        // });

        Schema::create('setting_menu_user', function (Blueprint $table) {
            // ID_setting sebagai auto-increment primary key
            $table->id('ID_setting'); // This will be the auto-increment primary key
            $table->unsignedBigInteger('ID_jenis_user');
            $table->unsignedBigInteger('ID_menu');
            $table->string('create_by', 30);
            $table->char('delete_mark', 1)->default('0');
            $table->string('update_by', 30)->nullable();
            $table->timestamps();
        
            // Definisikan foreign key dengan cascade on delete dan update
            $table->foreign('ID_jenis_user')->references('id')->on('jenis_users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_menu')->references('id')->on('menus');
        
            // Definisikan unique constraint untuk kombinasi ID_jenis_user dan ID_menu
            $table->unique(['ID_jenis_user', 'ID_menu'], 'setting_menu_user_unique');
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_menu_users');
    }
};

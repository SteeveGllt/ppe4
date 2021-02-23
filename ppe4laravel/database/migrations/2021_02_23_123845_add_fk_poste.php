<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPoste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postes', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
        
            $table->foreign('type_id')->references('id')->on('types');
        });
        Schema::table('postes', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id');
        
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
        Schema::table('postes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postes', function (Blueprint $table) {
            $table->dropColmun('type_id');    
    
        });
        Schema::table('postes', function (Blueprint $table) {
            $table->dropColmun('categorie_id');    
    
        });
        Schema::table('postes', function (Blueprint $table) {
            $table->dropColmun('user_id');    
    
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePoste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postuler', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('postuler', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('postuler', function (Blueprint $table) {
            $table->unsignedBigInteger('poste_id');
        
            $table->foreign('poste_id')->references('id')->on('postes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postuler', function (Blueprint $table) {
            $table->dropColmun('user_id');    
    
        });
        Schema::table('postuler', function (Blueprint $table) {
            $table->dropColmun('poste_id');    
    
        });
    }
}

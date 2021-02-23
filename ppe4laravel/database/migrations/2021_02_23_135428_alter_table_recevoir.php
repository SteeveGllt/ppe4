<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRecevoir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recevoir', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('recevoir', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('recevoir', function (Blueprint $table) {
            $table->unsignedBigInteger('message_id');
        
            $table->foreign('message_id')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recevoir', function (Blueprint $table) {
            $table->dropColmun('user_id');    
    
        });
        Schema::table('recevoir', function (Blueprint $table) {
            $table->dropColmun('message_id');
    
        });
    }
}

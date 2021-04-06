<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('from_id');
            $table->unsignedBigInteger('to_id');
            $table->foreign('from_id')->references('id')->on('users');
            $table->foreign('to_id')->references('id')->on('users');
            $table->text('content');
            $table->timestamp('created_at');
            $table->dateTime('read_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

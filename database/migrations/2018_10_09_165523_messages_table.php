<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table  ->increments('id');
            $table  ->string('text');
            $table  ->integer('from_id');
            $table  ->integer('to_id');

            $table  ->integer('user_id')->unsigned();
            $table  ->foreign('user_id')->references('id')->on('users');

            $table  ->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

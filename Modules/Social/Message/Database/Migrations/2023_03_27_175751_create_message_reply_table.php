<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_reply', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('color');
            $table->integer('privileges');


            #foreign reply
            $table->biginteger('message_id')->unsigned()->nullable();
            $table->foreign('message_id')->references('id')->on('messages');

            #foreign reply
            $table->biginteger('reply_id')->unsigned()->nullable();
            $table->foreign('reply_id')->references('id')->on('messages');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactions');
    }
};

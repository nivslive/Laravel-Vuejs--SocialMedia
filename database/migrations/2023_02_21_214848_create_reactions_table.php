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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
            #foreign subject
            #$table->biginteger('message_id')->unsigned();
            #$table->foreign('message_id')->references('id')->on('messages');

            #foreign subject
            #$table->biginteger('subject_id')->unsigned();
            #$table->foreign('subject_id')->references('id')->on('subjects');

            #foreign user
            #$table->biginteger('user_id')->unsigned();
            #$table->foreign('user_id')->references('id')->on('users');
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

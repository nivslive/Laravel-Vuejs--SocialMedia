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
        Schema::create('messages', function (Blueprint $table) {

            $table->id();
            $table->string('message');

            #foreign reactions
            $table->biginteger('reply_id')->nullable();
            #foreign reactions
            $table->biginteger('reactions_id')->nullable();


            #foreign subject
            $table->biginteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');

            #foreign user
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('messages');
    }
};

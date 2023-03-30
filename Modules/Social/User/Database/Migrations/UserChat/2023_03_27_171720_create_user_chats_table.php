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
        Schema::create('user_chat', function (Blueprint $table) {
            $table->id();
            $table->biginteger('status');
            
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->biginteger('user_friends_id')->nullable();
            #$table->foreign('user_friends_id')->references('id')->on('user_friends');
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

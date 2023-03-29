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
        Schema::create('bot_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->biginteger('bot_id')->unsigned();
            $table->foreign('bot_id')->references('id')->on('bots');

            $table->biginteger('bot_field_id')->unsigned();
            $table->foreign('bot_field_id')->references('id')->on('bot_fields');
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

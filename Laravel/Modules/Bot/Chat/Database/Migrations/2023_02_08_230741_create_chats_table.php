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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('background')->nullable();

            $table->biginteger('bot_id')->unsigned();
            $table->foreign('bot_id')->references('id')->on('bots');

            $table->biginteger('bot_selected_fields_id')->unsigned();
            $table->foreign('bot_selected_fields_id')->references('id')->on('bot_selected_fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
};

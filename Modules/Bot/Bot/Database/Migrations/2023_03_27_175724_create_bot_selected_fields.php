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
        Schema::create('bot_selected_fields', function (Blueprint $table) {
            $table->id();
            # A pergunta, questionamento, exemplo: O que precisa hoje? Qual o dia você estará disponível
            $table->string('content');
            $table->timestamps();

            #o robô escolhido
            $table->biginteger('bot_id')->unsigned();
            $table->foreign('bot_id')->references('id')->on('bots');
            
            #aqui será escolhido se será text, select, agenda...
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

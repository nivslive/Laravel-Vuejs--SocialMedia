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
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->id();
            #EXAMPLE
            #TYPE LIKE
            #TYPE SUBJECT
            #SE O USER POSTOU, COMENTOU, ETC.
            $table->biginteger('type');
            
            
            
            #se for like, vai ter o ID do Reaction aqui
            #se for subject, vai ter o ID do Subject aqui    
            $table->biginteger('type_id');
            
            #SE HOUVER VARIAÇÕES DISSO.
            $table->string('variation')->default(0);
            

                  
            #foreign user
            $table->biginteger('chat_id')->unsigned()->nullable();
            $table->foreign('chat_id')->references('id')->on('chats');
                        

            #foreign user
            $table->biginteger('subject_id')->unsigned()->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects');
            

            #foreign user
            $table->biginteger('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('reactions');
    }
};

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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            #foreign photos
            $table->biginteger('photo_id')->nullable();
            //$table->foreign('photo_id')->references('id')->on('photos');
            
            
            $table->biginteger('subject_external_link_id')->nullable();
            //$table->foreign('subject_external_link_id')->references('id')->on('subject_external_links');

            #foreign theme
            $table->biginteger('theme_id')->unsigned();
            $table->foreign('theme_id')->references('id')->on('themes');

            #foreign user
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};

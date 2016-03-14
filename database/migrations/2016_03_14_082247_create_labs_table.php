<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lab_name');
            $table->string('lab_address');
            $table->string('lab_ph');
            $table->string('lab_email')->unique();
            $table->string('lab_website');
            $table->integer('user_id')->unsigned()->default(0);   
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('city_id')->unsigned()->default(0);   
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('about');
            $table->string('location');
            $table->string('direction');
            $table->string('photo');
            $table->string('mime', 50);
            $table->integer('recordstatus')->unsigned()->default(1);
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
        Schema::drop('labs');
    }
}

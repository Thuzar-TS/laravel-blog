<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_ph');
            $table->string('hospital_email')->unique();
            $table->string('hospital_website');
            $table->integer('hospital_type')->unsigned()->default(0);   
            $table->foreign('hospital_type')->references('id')->on('types');
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
        Schema::drop('hospitals');
    }
}

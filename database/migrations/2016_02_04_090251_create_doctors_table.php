<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_address');
            $table->string('doctor_ph');
            $table->string('doctor_email')->unique();
            $table->integer('city_id')->unsigned()->default(0);   
            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->string('degree');
            $table->string('specialist');
            $table->string('photo');
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
        Schema::drop('doctors');
    }
}

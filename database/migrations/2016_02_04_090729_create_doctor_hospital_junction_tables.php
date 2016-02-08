<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorHospitalJunctionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_hospital_junction', function (Blueprint $table) {
            $table->increments('doctor_hospital_id');
            $table->integer('doctor_id')->unsigned()->default(0);   
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors');
            $table->integer('hospital_id')->unsigned()->default(0);   
            $table->foreign('hospital_id')->references('hospital_id')->on('hospitals');
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
        Schema::drop('doctor_hospital_junction');
    }
}

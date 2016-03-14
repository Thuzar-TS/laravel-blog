<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorHospitalJunctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_hospital_junction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->default(0);   
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->integer('hospital_id')->unsigned()->default(0);   
            $table->foreign('hospital_id')->references('id')->on('hospitals');
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

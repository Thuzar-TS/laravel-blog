<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalFacilitiesJunctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('hospital_facilities_junction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned()->default(0);   
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->integer('facilities_id')->unsigned()->default(0);   
            $table->foreign('facilities_id')->references('id')->on('facilities');
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
        Schema::drop('hospital_facilities_junction');
    }
}

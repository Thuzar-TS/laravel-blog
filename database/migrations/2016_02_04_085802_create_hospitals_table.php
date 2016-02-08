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
            $table->increments('hospital_id');
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->string('hospital_ph');
            $table->string('hospital_email')->unique();
            $table->string('hospital_website');
            $table->integer('hospital_type')->unsigned()->default(0);   
            $table->foreign('hospital_type')->references('type_id')->on('types');
            $table->integer('user_id')->unsigned()->default(0);   
            $table->foreign('user_id')->references('user_id')->on('users');
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

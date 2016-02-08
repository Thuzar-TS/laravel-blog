<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('login_id')->unique();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('role_id')->unsigned()->default(0);   
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->integer('recordstatus')->unsigned()->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

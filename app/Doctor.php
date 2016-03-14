<?php

namespace App;
use View;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    	 protected $table = 'doctors';
    	protected $fillable = ['doctor_name', 'doctor_address','doctor_email','doctor_ph', 'city_id', 'photo','mime'];
    	protected $hidden = ['remember_token'];
}
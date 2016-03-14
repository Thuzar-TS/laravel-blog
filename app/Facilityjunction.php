<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilityjunction extends Model
{
    	protected $table = 'hospital_facilities_junction';
    	protected $hidden = ['remember_token'];
    	protected $guarded = [];
}
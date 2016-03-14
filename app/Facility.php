<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    //protected $fillable = ['hospital_name', 'hospital_address','hospital_email','hospital_phone', 'hospital_type', 'photo','mime','user_id'];
    protected $hidden = array('remember_token');
    protected $guarded = [];
}

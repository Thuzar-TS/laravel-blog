<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
   protected $table = 'labs';
    //protected $fillable = ['hospital_name', 'hospital_address','hospital_email','hospital_phone', 'hospital_type', 'photo','mime','user_id'];
    protected $hidden = array('password', 'remember_token');
    public function user()
	{
		return $this->belongsTo('App\User');
	}
	protected $guarded = [];
}

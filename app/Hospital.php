<?php

namespace App;
use View;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitals';
    //protected $fillable = ['hospital_name', 'hospital_address','hospital_email','hospital_phone', 'hospital_type', 'photo','mime','user_id'];
    protected $hidden = array('password', 'remember_token');
    public function user()
	{
		return $this->belongsTo('App\User');
	}
	protected $guarded = [];
}

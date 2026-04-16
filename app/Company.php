<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
	public function location(){
		return $this->belongsTo('App\location');
	}

	public function depts(){
		
		return $this->hasMany('App\depts');
	}	
	public function users(){
		return $this->hasMany('App\User');
	}	
	}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitlog extends Model
{
    //
	public function link(){
		return $this->belongsTo('App\link');
	}
	
	public function user(){
		
		return $this->belongsTo('App\User');
	}
}

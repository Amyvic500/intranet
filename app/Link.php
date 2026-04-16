<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    //
	public function dept(){
		return $this->belongsTo('App\depts');
	}

		public function visitlogs(){
		return $this->hasMany('App\visitlog');
	}
}

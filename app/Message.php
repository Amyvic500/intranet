<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //
		public function dept(){
		return $this->belongsTo('App\depts');
	}	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    //
	public function companies(){
		return $this->hasMany('App\company', 'location_id');
	}
}

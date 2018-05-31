<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exterior extends Model
{
	protected $table = 'exteriors';

    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }
}

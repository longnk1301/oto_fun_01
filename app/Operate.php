<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operate extends Model
{
    protected $table = 'operates';

    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }
}

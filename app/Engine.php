<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $table = 'engines';

    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }
}

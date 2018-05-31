<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }
}

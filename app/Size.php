<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    public function vehicle()
    {
    	return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }
}

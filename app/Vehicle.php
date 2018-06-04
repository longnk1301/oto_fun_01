<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    public $fillable = [
        'id',
    	'car_id',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    public function exterior()
    {
        return $this->hasMany('App\Models\Exterior');
    }

    public function operate()
    {
        return $this->hasMany('App\Models\Operate');
    }

    public function size()
    {
        return $this->hasMany('App\Models\Size');
    }

    public function engine()
    {
        return $this->hasMany('App\Models\Engine');
    }
}

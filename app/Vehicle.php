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
        return $this->belongsTo('App\Models\Car', 'car_id', 'id');
    }

    public function exterior()
    {
        return $this->hasMany('App\Exterior');
    }

    public function operate()
    {
        return $this->hasMany('App\Operate');
    }

    public function size()
    {
        return $this->hasMany('App\Size');
    }

    public function engine()
    {
        return $this->hasMany('App\Engine');
    }

    public function color()
    {
        return $this->hasMany('App\Color');
    }
}

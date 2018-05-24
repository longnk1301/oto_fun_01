<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    public $fillable = [
    	'interior_color',
    	'exterior_color',
    	'transmission',
    	'engine',
    	'mileage',
    	'fuel_type',
    	'drive_type',
    	'mpg',
    	'car_id',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id', 'id');
    }
}

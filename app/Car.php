<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function getCar()
    {
    	$car = Car::find($this->id);
        return $car;
    }

     public function getVehicle()
    {
        return $this->hasMany('App\Models\Vehicle', 'id', 'vehicle');
    }
}

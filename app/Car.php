<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function getCar()
    {
    	$car = Car::find($this->id);
        return $car;
    }
}

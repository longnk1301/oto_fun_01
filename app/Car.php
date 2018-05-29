<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	public $fillable = [
        'car_name',
        'car_type',
        'car_cost',
        'tags',
        'car_company',
        'car_number',
        'car_years',
        'summary',
        'id',
    ];

    public function getCar()
    {
    	$car = Car::find($this->id);

        return $car;
    }

    public function vehicle()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function getVehicle()
    {
        $car = Vehicle::find($this->id);

        return $car;
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}

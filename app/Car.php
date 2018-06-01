<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	public $fillable = [
        'car_name',
        'comp_id',
        'type_id',
        'car_cost',
        'car_number',
        'car_year',
        'summary',
        'status',
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

    public function operate()
    {
        return $this->hasManyThrough('App\Models\Operate', 'App\Models\Vehicle');
    }

    public function getOperate()
    {
        $operates = Operate::find($this->id);

        return $operates;
    }

    public function color()
    {
        return $this->hasManyThrough('App\Models\Color', 'App\Models\Vehicle');
    }

    public function getColor()
    {
        $colors = Color::find($this->id);

        return $colors;
    }

    public function engine()
    {
        return $this->hasManyThrough('App\Models\Engine', 'App\Models\Vehicle');
    }

    public function getEngine()
    {
        $engines = Engine::find($this->id);

        return $engines;
    }

    public function exterior()
    {
        return $this->hasManyThrough('App\Models\Exterior', 'App\Models\Vehicle');
    }

    public function getExterior()
    {
        $exteriors = Exterior::find($this->id);

        return $exteriors;
    }

    public function size()
    {
        return $this->hasManyThrough('App\Models\Size', 'App\Models\Vehicle');
    }

    public function getSize()
    {
        $sizes = Size::find($this->id);

        return $sizes;
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function getCompany()
    {
        $companys = Company::find($this->comp_id);

        return $companys;
    }

    public function carType()
    {
        return $this->belongsTo('App\Models\CarType', 'type_id', 'id');
    }

    public function getCarType()
    {
        $car_type = CarType::find($this->type_id);

        return $car_type;
    }
}

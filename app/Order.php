<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
	
    public $fillable = [
        'cus_name',
        'identification',
        'cus_zip',
        'cus_phone',
        'cus_add',
        'cus_email',
        'content',
        'car_id',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id', 'id');
    }

    public function getCar()
    {
        $orders = \App\Models\Car::find($this->car_id);

        return $orders;
    }

    public function getVehicle()
    {
        $orders = \App\Models\Vehicle::find($this->car_id);

        return $orders;
    }
}

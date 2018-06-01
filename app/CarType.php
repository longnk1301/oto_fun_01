<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $table = 'car_type';

    public $fillable = [
        'type'
    ];

    public function car()
    {
    	return $this->hashMany('App\Models\Car');
    }
}

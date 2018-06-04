<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCar extends Model
{
    protected $table = 'image_car';

    public $fillable = [
        'car_id',
        'color_id',
        'image',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
}

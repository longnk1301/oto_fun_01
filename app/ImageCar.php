<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageCar extends Model
{
    protected $table = 'image_car';

    public $fillable = [
        'car_id',
        'color_id',
        'image',
    ];
}

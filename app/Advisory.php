<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    protected $table = 'advisory';

    public $fillable = [
        'cus_name',
        'identification',
        'cus_phone',
        'cus_add',
        'cus_email',
        'content',
        'car_id',
        'status',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    public function getCar()
    {
        $advisory = Car::find($this->car_id);

        return $advisory;
    }
}

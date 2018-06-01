<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    public $fillable = [
        'vehicle_id',
        'height',
        'weight',
        'width',
        'colc',
        'volume_fuel',
    ];

    public function vehicle()
    {
    	return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}

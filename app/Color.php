<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    public $fillable = [
        'vehicle_id',
        'color',
    ];

    public function vehicle()
    {
    	return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}

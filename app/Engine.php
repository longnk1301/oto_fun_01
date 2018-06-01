<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $table = 'engines';

    public $fillable = [
        'vehicle_id',
        'engine_type',
        'cylinder_capacity',
        'max_capacity',
        'drive_type',
        'drive_style',
    ];

    public function vehicle()
    {
    	return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}

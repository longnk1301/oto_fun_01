<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exterior extends Model
{
	protected $table = 'exteriors';

	public $fillable = [
        'vehicle_id',
        'locks_nearby',
        'locks_remote',
        'turn_signal_light',
    ];

    public function vehicle()
    {
    	return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}

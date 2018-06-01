<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operate extends Model
{
    protected $table = 'operates';

    public $fillable = [
        'vehicle_id',
        'tissue_man',
        'gear',
    ];

    public function vehicle()
    {
    	return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }
}

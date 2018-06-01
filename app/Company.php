<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';

	public $fillable = [
        'com_name',
        'com_add',
        'com_phone',
    ];

    public function car()
    {
        return $this->hasMany('App\Models\Car');
    }
}

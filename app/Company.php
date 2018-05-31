<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company'

    public function car()
    {
        return $this->hasMany('App\Models\Car');
    }
}

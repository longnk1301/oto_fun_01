<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	
    public $fillable = [
        'category_name',
        'summary',
        'slug',
        'parent_id',
        'image',
        'status',
    ];

    public function getParentName()
    {
    	$parent = self::find($this->parent_id);
    	if (!$parent) {
    		return null;
    	}
    	return $parent->category_name;
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}

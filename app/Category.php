<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	
    public $fillable = ['cate_name', 'summary', 'tags', 'slug', 'parent_id'];

    public function getParentName()
    {
    	$parent = self::find($this->parent_id);
    	if (!$parent) {
    		return null;
    	}
    	return $parent->cate_name;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $fillable = ['title', 'cate_id', 'content', 'slug', 'summary'];

    public function getCate()
    {
        $cate = Category::find($this->cate_id);

        return $cate;
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cate_id', 'id');
    }
}

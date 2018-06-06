<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $fillable = [
        'title',
        'category_id',
        'content',
        'slug',
        'summary',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getCate()
    {
        $category = Category::find($this->category_id);
        
        return $category;
    }

    public function image()
    {
        return $this->hasMany('App\Models\ImagePost');
    }

    public function getImagePost()
    {
        $post = Post::find($this->id);
        $images = ImagePost::where('post_id', $post->id);

        return $images;
    }

    public $timestamps = true;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
	protected $table = 'image_post';

    public $fillable = [
        'post_id',
        'image',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function getCate()
    {
        $cate = Category::find($this->cate_id);

        return $cate;
    }
}

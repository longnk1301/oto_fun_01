<?php

namespace App\Repositories\Eloquents;

use App\Models\Post;
use App\Models\Category;
use App\Models\Car;
use App\Models\Vehicle;

class SearchingRepository
{
    public function searchPost(array $attributes)
    {
        if (!$attributes['keyword']) {

            return redirect(route('homepage'));
        }
        $keyword = $attributes['keyword'];
        $posts = Post::where('status', 'Public')->where('title', 'like', "%$keyword%")->paginate(config('app.paginate'));
        $posts->withPath("?keyword=$keyword");
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
        }

        return $posts;
    }

    public function searchProduct(array $attributes)
    {
        if (!$attributes['keyword']) {

            return redirect(route('homepage'));
        }
        $keyword = $attributes['keyword'];
        $cars = Car::where('status', 'Public')->where('car_name', 'like', "%$keyword%")->paginate();
        $cars->withPath("?keyword=$keyword");

        return $cars;
    }
}

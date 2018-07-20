<?php

namespace App\Repositories\Eloquents;

use App\Models\Post;
use App\Models\Category;
use App\Models\Car;
use App\Models\Vehicle;
use App\Models\CarType;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class SearchingRepository
{
    public function searchPost(array $attributes)
    {
        if (!$attributes['keyword']) {

            return redirect(route('homepage'));
        }
        $keyword = $attributes['keyword'];
        $posts = Post::where('status', 'Public')
                        ->where('title', 'like', "%$keyword%")
                        ->paginate(config('app.paginate'));
        $posts->withPath("?keyword=$keyword");
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
        }

        return $posts;
    }

    public function searchProduct(array $attributes)
    {
        // dd($attributes);
        if (!$attributes['keyword']) {

            return redirect(route('homepage'));
        }
        $keyword = $attributes['keyword'];
        $cars = Car::where('status', 'Public')
                    ->where('car_name', 'like', "%$keyword%")
                    // ->orwhere('')
                    ->paginate();
        $cars->withPath("?keyword=$keyword");
        
        // $cars = DB::table('cars')
        //         ->join('car_type', 'type_id', '=', 'car_type.id')
        //         ->join('company', 'comp_id', '=', 'company.id')
        //         ->where('car_name', 'like', "%$keyword%")
        //         ->where('status', 'Public')
        //         ->orwhere('type', 'like', "%$keyword%")
        //         ->orwhere('com_name', 'like', "%$keyword%")->paginate();
        // $cars->withPath("?keyword=$keyword");
        
        // $cars = Car::with(['car_type', 'company'])
        //             ->where([
        //                 ['car_name', 'like', "%$keyword%"],
        //                 ['status', 'Public'],
        //             ])
        //             ->orWhere('type', 'like', "%$keyword%")
        //             ->orWhere('company.com_name', 'like', "%$keyword%")
        //             ->paginate();
        // $cars->withPath("?keyword=$keyword");

        return $cars;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Car;
use App\Models\Category;
use App\Models\Vehicle;

class HomeController extends Controller
{
    // trang chu
    public function homepage()
    {
        return view('welcome');
    }

    //trang san pham mới, lấy loại xe để check từng loại
    public function newcar()
    {
        $new_car = Car::distinct()->where('car_years', Carbon::now()->year)->get(['car_type']);
        return view('car.new_car', compact('new_car'));
    }

    //lấy dữ liệu new car chuyển sang json
    public function getNewCar(Request $request)
    {
        $getcar = Car::where('car_type', $request->car_type)->where('car_years', Carbon::now()->year)->get();

        return response()->json($getcar);
    }

    //lấy dữ liệu used car chuyen sang dang json
    public function getUsedCar(Request $request)
    {
        $getcar = Car::where('car_type', $request->car_type)->whereBetween('car_years', [2010, 2017])->get();
        return response()->json($getcar);
    }

    //trang san phẩm cũ
    public function usedcar()
    {
        $used_car = Car::whereBetween('car_years', [2010, 2017])->distinct()->get(['car_type']);

        return view('car.used_car', compact('used_car'));
    }

    //details car
    public function detail_car(Request $request, $id)
    {
        $detail_car = Car::where('id', $id)->first();
        $vehicle = Car::find($id)->vehicle()->get();

        return view('car.detail_car', compact('detail_car', 'vehicle'));
    }


    public function findCar(Request $request)
    {
        $car = Car::find($request->carId);

        return response()->json($car);
    }

    // trang tin tức
    public function news()
    {
        $posts = Post::paginate(config('app.paginate'));
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
        }

        return view('post.news', compact('posts'));
    }

    //trỏ tới form search
    public function view_used_car_for_sale()
    {
        $car_sale = Car::distinct()->get(['car_type']);

        return view('search.used_car_for_sale', compact('car_sale'));
    }

    //so sanh
    public function compare()
    {
        $compare = Car::all();

        return view('compare.compare', compact('compare'));
    }

    public function getListCompare(Request $request)
    {
        if ($request->session()->has('compare_name') == true) {
            $list_compare = $request->session()->get('compare_name');
                foreach($list_compare as $key => $value) {
                    echo $value . "</br>";
                }
        }
    }

    public function compareAdd(Request $request)
    {
        
    }

    public function compareDeleteAll(Request $request)
    {
        if ($request->session()->has('compare_name')) {
            $request->session()->forget('compare_name');
        }
        return redirect('/compare-list');
    }

    public function compareDeleteItem(Request $request)
    {
        
    }

    //lấy slug chuyên mục
    public function categories($cateSlug)
    {
        $cate = Category::where('slug', $cateSlug)->first();
        $posts = Post::where('cate_id', $cate->id)->paginate();

        return view('post.cate_detail', compact('posts', 'cate'));
    }

    //bài viết
    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('post.news_detail', compact('post'));
    }

    //Thay doi ngon ngu
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }

    public function getSession(Request $request)
    {
        return $request->session()->all();
    }
}

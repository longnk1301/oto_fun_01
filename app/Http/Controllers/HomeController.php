<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Car;
use App\Category;

class HomeController extends Controller
{

    // trang chu
    public function homepage()
    {
        return view('welcome');
    }

    //trang admin
    public function index()
    {
        return view('user.admin.home');
    }

    //trang post-data admin
    public function getPostData()
    {
        $post_data = Post::all();

        return view('user.admin.post.index', compact('post_data'));
    }

    //trang car-data admin
    public function getCarData()
    {
        $car_data = Car::all();

        return view('user.admin.car.index', compact('car_data'));
    }

    //trang san pham mới, lấy loại xe để check từng loại
    public function newcar()
    {
        $new_car = Car::distinct()->where('car_years', Carbon::now()->year)->get(['car_type']);
        return view('car.new_car', compact('new_car'));
    }

    //lấy dữ liệu new car chuyển sang json
    public function getCar(Request $request)
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
    public function detail_car($id)
    {
        $detail_car = Car::where('id', $id)->first();

        return view('car.detail_car', compact('detail_car'));
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

    //Tìm kiếm bài viết
    public function search(Request $request)
    {

        if (!$request->keyword) {

            return redirect(route('homepage'));
        }
        $keyword = $request->keyword;
        $posts = Post::where('title', 'like', "%$keyword%")->paginate();
        $posts->withPath("?keyword=$keyword");
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
        }

        return view('search.search_result', compact('keyword', 'posts'));
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
}

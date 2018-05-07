<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    //trang post-data
    public function post_data()
    {
        $post_data = Post::all();
        return view('user.admin.post.index', compact('post_data'));
    }

    //trang car-data
    public function car_data()
    {
        $car_data = Car::all();
        return view('user.admin.car.index', compact('car_data'));
    }

    //trang san pham
    public function newcar()
    {
        $newcar = Car::all();
        return view('car.new_car', compact('newcar'));
    }

    public function usedcar()
    {
        $usedcar = Car::all();
        return view('car.used_car', compact('usedcar'));
    }

    // trang bai viet
    public function news()
    {
        $posts = Post::paginate(config('app.paginate'));
        return view('post.news', compact('posts'));
    }

    public function categories($cateSlug)
    {
        $cate = Category::where('slug', $cateSlug)->first();
        $posts = Post::where('cate_id', $cate->id)->paginate();
        return view('post.cate_detail', compact('posts', 'cate'));
    }

    //bai viet
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

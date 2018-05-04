<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Car;

class HomeController extends Controller
{
    // trang chu
    public function homepage()
    {
        return view('welcome');
    }

    public function index()
    {
        return view('user.admin.home');
    }

    //bai viet
    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('news_detail', compact('post'));
    }

    public function car()
    {
        $car = Car::paginate(config('app.paginate'));
        return view('car', compact('car'));
    }

    // trang da dang nhap thanh cong
    public function news()
    {
        $posts = Post::paginate(config('app.paginate'));
        return view('news', compact('posts'));
    }

    //Thay doi ngon ngu
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        return redirect()->back();
    }
}

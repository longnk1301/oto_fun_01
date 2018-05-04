<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
// trang chu
    public function homepage()
    {
        return view('welcome');
    }
// trang da dang nhap thanh cong
    public function index()
    {
        return view('home');
    }
//Thay doi ngon ngu
    public function changeLanguage($language)
    {
    \Session::put('website_language', $language);

    return redirect()->back();
    }
}

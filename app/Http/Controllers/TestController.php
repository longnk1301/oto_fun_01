<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function check(Request $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        // dd($data);
        if(Auth::attempt($data)){
            // return view('home');
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    }
}

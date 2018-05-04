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
        if (Auth::attempt($data)) {
            return redirect()->route('user.admin.home');
        } else {
            return view('auth.login');
        }
    }
}

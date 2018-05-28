<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PostProfile;
use Illuminate\Support\Facades\Auth;
use App\User;
use Lang;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember)
            || Auth::attempt(['email' => $request->name, 'password' => $request->password], $request->remember)) {
            return redirect()->route('home');
        } else {
            return back()->with('msg', Lang::get('auth.wrong_acc'));
        }
    }

    public function getProfile()
    {
        $user = Auth::user();

        return view('auth.profile', compact('user'));
    }

    public function postProfile(PostProfile $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->add = $request->add;
        $user->save();

        return redirect('admin.profile')->with('msg', Lang::get('auth.success_info'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Lang;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:11',
            'add' => 'required|string|min:4|max:255',
            'password' => 'required|string|min:6|max:32|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->add = $request->add;
        // if($request->hasFile('avatar')) {
        //     $file = $request->file('avatar');
        //     $fileName = uniqid() . '-' . $file->getClientOriginalName();
        //     $file->storeAs('public/avatar', $fileName);
        //     $user->avatar = 'storage/avatar/'.$fileName;
        // }
        $user->save();

        return redirect('register')->with('msg', Lang::get('auth.suc_register'));
    }
}

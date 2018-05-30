<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $users = User::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($users as $user) {
                $user['role_name'] = $user->getRole();
            }
        } else {
            $users = User::where('name', 'like', "%$keyword%")->orwhere('add', 'like', "%$keyword%")->paginate();
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            foreach ($users as $user) {
                $user['role_name'] = $user->getRole();
            }
        }
        $users->withPath($addPath);

        return view('user.admin.user.index', compact('users', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function save(Request $request)
    {
        if ($request->id) {
           $model = User::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new User();
        }
        $model->roles = $request->role;
        $model->save();

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return view('user.admin.404');
        } else {
            $role = Role::find($user->roles);
            $checked = $role->role_name;

            return view('user.admin.user.form', compact('checked', 'user'));
        }

        return view('user.admin.user.form', compact('user'));
    }

    public function remove($id)
    {
        $user = User::find($id);
        if (!$user) {
            return view('user.admin.404');
        } else {
            $user->delete();

            return redirect(route('user.index'));
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;

class ColorController extends Controller
{
    public function getColor(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $colors = Color::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
        } else {
            $colors = Color::where('color', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
        }
        $colors->withPath($addPath);

        return view('user.admin.color.index', compact('colors', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add()
    {
        $model = new Color();

        return view('user.admin.color.form', compact('model'));
    }

    public function checkName(Request $request)
    {
        $color = Color::where('color', $request->name)->first();
        if($color && $color->id == $request->id) {
            return response()->json(true);
        }
        $result = $color == false ? true : false;

        return response()->json($result);
    }

    public function save(Request $request)
    {
        if ($request->id) {
        $model = Color::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Color();
        }
        $model->fill($request->all());
        $model->save();

        return redirect()->route('color.index');
    }

    public function edit($id)
    {
     $model = Color::find($id);
        if (!$model) {
            return view('user.admin.404');
        } else {
            return view('user.admin.color.form', compact('model'));
        }

        return view('user.admin.color.form', compact('model'));
    }

    public function remove($id)
    {
     $color = Color::find($id);
        if (!$color) {
            return view('user.admin.404');
        } else {
            $color->delete();

            return redirect(route('color.index'));
        }
    }
}

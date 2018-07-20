<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarType;
use App\Models\Car;

class CarTypeController extends Controller
{
    public function getCarType(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $types = CarType::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
        } else {
            $types = CarType::where('type', 'like', "%$keyword%")->paginate($pageSize);
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
        }
        $types->withPath($addPath);

        return view('user.admin.car_type.index', compact('types', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add()
    {
        $model = new CarType();

        return view('user.admin.car_type.form', compact('model'));
    }

    public function checkName(Request $request)
    {
        $type = CarType::where('type', $request->name)->first();
        if($type && $type->id == $request->id) {
            return response()->json(true);
        }
        $result = $type == false ? true : false;

        return response()->json($result);
    }

    public function save(Request $request)
    {
        if ($request->id) {
        $model = CarType::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new CarType();
        }
        $model->fill($request->all());
        $model->save();

        return redirect()->route('car_type.index');
    }

    public function edit($id)
    {
     $model = CarType::find($id);
        if (!$model) {
            return view('user.admin.404');
        } else {
            return view('user.admin.car_type.form', compact('model'));
        }

        return view('user.admin.company.form', compact('model'));
    }

    public function remove($id)
    {
     $type = CarType::find($id);
        if (!$type) {
            return view('user.admin.404');
        } else {
            $type->delete();
            // $cars = Car::where('type_id', $id)->get();
            // // dd($cars);
            // $cars->delete();

            return redirect(route('car_type.index'));
        }
    }
}

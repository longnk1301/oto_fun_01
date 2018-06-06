<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advisory;
use App\Models\Car;
use App\Models\Color;
use App\Models\CarType;
use App\Models\Company;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $advisorys = Advisory::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($advisorys as $advisory) {
                $advisory['car_name'] = $advisory->getCar();
            }
        } else {
            $advisorys = Advisory::where('cus_name', 'like', "%$keyword%")->orwhere('cus_add', 'like', "%$keyword%")->paginate();
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            foreach ($advisory as $advisory) {
                $advisory['car_name'] = $advisory->getCar();
            }
        }
        $advisorys->withPath($addPath);

        return view('user.admin.order.index', compact('advisorys', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function save(Request $request)
    {
        if ($request->id) {
           $model = Advisory::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Advisory();
        }
        $model->fill($request->all());
        $model->status = $request->status;
        $model->save();

        return redirect()->route('order.index');
    }

    public function edit($id)
    {
        $advisory = Advisory::find($id);
        if (!$advisory) {
            return view('user.admin.404');
        } else {
            $checked = $advisory->status;
            $car = Car::find($advisory->car_id);
            $colors = Color::where('id', $car->color_id)->first();
            $types = CarType::where('id', $car->type_id)->first();
            $companys = Company::where('id', $car->comp_id)->first();


            return view('user.admin.order.form', compact('checked', 'car', 'colors', 'advisory', 'types', 'companys'));
        }
        $car = Car::all();

        return view('user.admin.order.form', compact('model', 'advisory', 'vehicle', 'car'));
    }

    public function remove($id)
    {
        $advisory = Advisory::find($id);
        if (!$advisory) {
            return view('user.admin.404');
        } else {
            $advisory->delete();

            return redirect(route('order.index'));
        }
    }
}

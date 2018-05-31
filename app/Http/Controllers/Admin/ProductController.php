<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Vehicle;

class ProductController extends Controller
{
    public function getProduct(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 5 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $products = Car::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($products as $product) {
                $product['vehicles'] = $product->getVehicle();
            }
        } else {
            $products = Car::where('car_type', 'like', "%$keyword%")->orwhere('car_name', 'like', "%$keyword%")->paginate();
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            foreach ($products as $product) {
                $product['vehicles'] = $product->getVehicle();
            }
        }
        $products->withPath($addPath);

        return view('user.admin.car.index', compact('products', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function add(Car $model, Vehicle $vehicle)
    {
        return view('user.admin.car.form', compact('model', 'vehicle'));
    }

    public function checkName(Request $request)
    {
        $car = Car::where('car_name', $request->car_name)->first();
        if($car && $car->id == $request->id) {
            return response()->json(true);
        }
        $result = $car == false ? true : false;

        return response()->json($result);
    }

    public function save(Request $request)
    {
        if ($request->id) {
           $model = Car::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Car();
        }
        $model->fill($request->all());

        // upload file
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/products', $fileName);
            $model->car_image = 'storage/products/'.$fileName;
        }
        $model->save();

        if ($request->id) {
           $vehicle = Vehicle::find($request->id);
            if (!$vehicle) {
                return view('user.admin.404');
            }
        } else {
            $vehicle = new Vehicle();
            $vehicle->car_id = $model->id;
        }
        $vehicle->fill($request->all());
        $vehicle->save();

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $model = Car::find($id);
        if (!$model) {
            return view('user.admin.404');
        } else {
            $cars = Car::distinct()->get(['car_type']);
            $vehicle = Vehicle::find($id);
            return view('user.admin.car.form', compact('model', 'cars', 'vehicle'));
        }
        $cars = Car::distinct()->get(['car_type']);
        $vehicle = Vehicle::all();

        return view('user.admin.car.form', compact('model', 'cars', 'vehicle'));
    }

    public function remove($id)
    {
        $products = Car::find($id);
        if (!$products) {
            return view('user.admin.404');
        } else {
            $products->delete();

            return redirect(route('product.index'));
        }
    }
}

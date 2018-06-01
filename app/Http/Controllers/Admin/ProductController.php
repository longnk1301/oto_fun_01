<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Vehicle;
use App\Models\Operate;
use App\Models\CarType;
use App\Models\Color;
use App\Models\Company;
use App\Models\Engine;
use App\Models\Exterior;
use App\Models\Size;

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
                $product['operates'] = $product->getOperate();
                $product['colors'] = $product->getColor();
                $product['engines'] = $product->getEngine();
                $product['exteriors'] = $product->getExterior();
                $product['sizes'] = $product->getSize();
                $product['car_type'] = $product->getCarType();
                $product['companys'] = $product->getCompany();
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

    public function show($id)
    {
        $detail_car = Car::find($id);
        // dd($detail_car);
        if (!$detail_car) {
            return view('user.admin.404');
        } else {
            $id_vehicle = Vehicle::where('car_id', $id)->pluck('id')->first();
            $vehicle = Vehicle::where('car_id', $id)->first();
            $operates = Operate::where('vehicle_id', $id_vehicle)->first();
            $colors = Color::where('vehicle_id', $id_vehicle)->get();
            $engines = Engine::where('vehicle_id', $id_vehicle)->first();
            $exteriors = Exterior::where('vehicle_id', $id_vehicle)->first();
            $sizes = Size::where('vehicle_id', $id_vehicle)->first();
            $car_type = CarType::where('id', $id)->first();
            $companys = Company::where('id', $id)->first();
            }
        return view('user.admin.car.details_car', compact(
            'detail_car',
            'operates',
            'vehicle',
            'colors',
            'engines',
            'exteriors',
            'sizes',
            'car_type',
            'company'
        ));
    }

    public function add(Car $car, Vehicle $vehicle, Operate $operates, Color $colors, Engine $engines, Exterior $exteriors, Size $sizes, CarType $car_type, Company $companys)
    {
        $car_types = CarType::all();
        $types = [];
        $typed = $car->type_id;
            foreach ($car_types as $type) {
                $types[$type->id] = $type->type;
            }

        $car_companys = Company::all();
        $car_company = [];
        $companyed = $car->comp_id;
            foreach ($car_companys as $company) {
                $car_company[$company->id] = $company->com_name;
            }

        $car_colors = Color::all();
        $car_color = [];
        $colored = $colors->vehicle_id;
            foreach ($car_colors as $color) {
                $car_color[$color->id] = $color->color;
            }

        return view('user.admin.car.form', compact(
            'car', 'vehicle', 'operates', 'colors', 'engines', 'exteriors', 'sizes', 'car_type', 'companys',
            'types', 'typed',
            'car_company', 'companyed',
            'car_color', 'colored'));
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
        dd($request->all());
        if ($request->id) {
           $car = Car::find($request->id);
            if (!$car) {
                return view('user.admin.404');
            }
        } else {
            $car = new Car();
        }
        $car->fill($request->all());

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

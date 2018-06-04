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
use App\Models\ImageCar;
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
                $product['car_type'] = $product->getCarType();
                $product['companys'] = $product->getCompany();
                $product['images'] = $product->getImageCar()->get();
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
        if (!$detail_car) {
            return view('user.admin.404');
        } else {
            $id_vehicle = Vehicle::where('car_id', $id)->pluck('id')->first();
            $operates = Operate::where('vehicle_id', $id_vehicle)->first();
            $colors = Color::where('id', $detail_car->color_id)->first();
            $engines = Engine::where('vehicle_id', $id_vehicle)->first();
            $exteriors = Exterior::where('vehicle_id', $id_vehicle)->first();
            $sizes = Size::where('vehicle_id', $id_vehicle)->first();
            $car_type = CarType::where('id', $id)->first();
            $companys = Company::where('id', $id)->first();
            $images = ImageCar::where('car_id', $id)->get();
            }
        return view('user.admin.car.details_car', compact(
            'detail_car',
            'operates',
            'colors',
            'engines',
            'exteriors',
            'sizes',
            'car_type',
            'company',
            'images'
        ));
    }

    public function add(Car $car, Vehicle $vehicle, Operate $operates, Engine $engines, Exterior $exteriors, Size $sizes)
    {
        $status = $car->status;
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
        $colored = $car->color_id;
            foreach ($car_colors as $color) {
                $car_color[$color->id] = $color->color;
            }

        return view('user.admin.car.form', compact(
            'car', 'vehicle', 'operates', 'engines', 'exteriors', 'sizes', 'car_type', 'companys', 'status',
            'types', 'typed',
            'car_company', 'companyed',
            'car_color', 'colored'
        ));
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
           $car = Car::find($request->id);
            if (!$car) {
                return view('user.admin.404');
            }
        } else {
            $car = new Car();
            $car->type_id = $request->type;
            $car->comp_id = $request->com_name;
            $car->color_id = $request->color;
            $car->status = $request->status;
        }
        $car->fill($request->all());
        $car->save();

        if ($request->id) {
           $vehicle = Vehicle::find($request->id);
            if (!$vehicle) {
                return view('user.admin.404');
            }
        } else {
            $vehicle = new Vehicle();
            $vehicle->car_id = $car->id;
        }
        $vehicle->fill($request->all());
        $vehicle->save();

        if ($request->id) {
            $id_vehicle = Vehicle::where('car_id', $request->id)->pluck('id')->first();
            $operates = Operate::where('vehicle_id', $id_vehicle)->first();
            if (!$operates) {
                return view('user.admin.404');
            }
        } else {
            $operates = new Operate();
            $operates->vehicle_id = $vehicle->id;
            $operates->tissue_man = $request->tissue_man;
            $operates->gear = $request->gear;
        }
        $operates->fill($request->all());
        $operates->save();

        if ($request->id) {
            $id_vehicle = Vehicle::where('car_id', $request->id)->pluck('id')->first();
            $engines = Engine::where('vehicle_id', $id_vehicle)->first();
            if (!$engines) {
                return view('user.admin.404');
            }
        } else {
            $engines = new Engine();
            $engines->vehicle_id = $vehicle->id;
            $engines->engine_type = $request->engine_type;
            $engines->cylinder_capacity = $request->cylinder_capacity;
            $engines->max_capacity = $request->max_capacity;
            $engines->drive_type = $request->drive_type;
            $engines->drive_style = $request->drive_style;
        }
        $engines->fill($request->all());
        $engines->save();

        if ($request->id) {
            $id_vehicle = Vehicle::where('car_id', $request->id)->pluck('id')->first();
            $exteriors = Exterior::where('vehicle_id', $id_vehicle)->first();
            if (!$exteriors) {
                return view('user.admin.404');
            }
        } else {
            $exteriors = new Exterior();
            $exteriors->vehicle_id = $vehicle->id;
            $exteriors->locks_nearby = $request->locks_nearby;
            $exteriors->locks_remote = $request->locks_remote;
            $exteriors->turn_signal_light = $request->turn_signal_light;
        }
        $exteriors->fill($request->all());
        $exteriors->save();

        if ($request->id) {
            $id_vehicle = Vehicle::where('car_id', $request->id)->pluck('id')->first();
            $sizes = Size::where('vehicle_id', $id_vehicle)->first();
            if (!$sizes) {
                return view('user.admin.404');
            }
        } else {
            $sizes = new Size();
            $sizes->vehicle_id = $vehicle->id;
            $sizes->height = $request->height;
            $sizes->weight = $request->weight;
            $sizes->width = $request->width;
            $sizes->colc = $request->colc;
            $sizes->volume_fuel = $request->volume_fuel;
        }
        $sizes->fill($request->all());
        $sizes->save();

        // upload file
        if($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $images = new ImageCar();
                $fileName = uniqid() . '-' . $file->getClientOriginalName();
                $file->storeAs('public/products', $fileName);
                $images->image = 'storage/products/'.$fileName;
                $images->car_id = $car->id;
                $images->save();
            }
        }

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        $car_types = CarType::all();
        $types = [];
        $car_companys = Company::all();
        $car_company = [];
        $car_colors = Color::all();
        $car_color = [];
        if (!$car) {
            return view('user.admin.404');
        } else {
            $id_vehicle = Vehicle::where('car_id', $id)->pluck('id')->first();
            $operates = Operate::where('vehicle_id', $id_vehicle)->first();
            $engines = Engine::where('vehicle_id', $id_vehicle)->first();
            $exteriors = Exterior::where('vehicle_id', $id_vehicle)->first();
            $sizes = Size::where('vehicle_id', $id_vehicle)->first();
            $images = ImageCar::where('car_id', $id)->get();
            $status = $car->status;

            $typed = $car->type_id;
            foreach ($car_types as $type) {
                $types[$type->id] = $type->type;
            }


            $companyed = $car->comp_id;
            foreach ($car_companys as $company) {
                $car_company[$company->id] = $company->com_name;
            }

            $colored = $car->color_id;
            foreach ($car_colors as $color) {
                $car_color[$color->id] = $color->color;
            }

            return view('user.admin.car.form', compact(
                'car',
                'operates',
                'colors',
                'engines',
                'exteriors',
                'sizes',
                'car_type',
                'company',
                'images',
                'status',
                'types', 'typed',
                'car_company', 'companyed',
                'car_color', 'colored'
            ));
        }

        return view('user.admin.car.form', compact(
            'car',
            'operates',
            'vehicle',
            'colors',
            'engines',
            'exteriors',
            'sizes',
            'car_type',
            'company',
            'images'
        ));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\ImageCar;
use App\Models\CarType;
use App\Models\Company;
use App\Repositories\Eloquents\SearchingRepository;

class ProductsController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchingRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function searchProduct(Request $request)
    {
        $data = $request->all();
        $cars = $this->searchRepository->searchProduct($data);
        // dd($cars);
        // $type = CarType::where('id', $cars->type_id)->first();
        // $img = ImageCar::where('car_id', $cars->id)->first();
        // $comp = Company::where('id', $cars->comp_id)->first();
        
        // dd($cars);
        foreach ($cars as $car) {
            $car['img'] = $car->getImageCar()->first();
            $car['car_type'] = $car->getCarType()->first();
            $car['company'] = $car->getCompany()->first();
        }
        // $array[] = (array)$cars;
        // dd($array);
        // foreach ($array as $car) {
                # code...
            // dd($car);
            // print_r($car);
            // $car = get_object_vars($car);
            // dd($car);
            // print_r($img);
            // $car['img'] = ImageCar::where('car_id', $c->id)->value('image');
            // print_r($car);
            // $car['car_type'] = CarType::where('id', $car->type_id)->first();
            // $car['company'] = Company::where('id', $car->comp_id)->first();
        // }
        // dd($array);
        return view('search.search_products', compact('cars', 'request'));
    }
}

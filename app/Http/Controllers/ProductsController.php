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
        foreach ($cars as $car) {
            $car['img'] = $car->getImageCar()->first();
            $car['car_type'] = $car->getCarType()->first();
            $car['company'] = $car->getCompany()->first();
        }
        return view('search.search_products', compact('cars', 'request'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;

class CarsController extends Controller
{
    //trang car-data admin
    public function getCarData()
    {
        $car_data = Car::all();

        return view('user.admin.car.index', compact('car_data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
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

        return view('search.search_products', compact('cars'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Car;
use App\Models\Category;
use App\Models\Vehicle;

class HomeController extends Controller
{
    // trang chu
    public function homepage()
    {
        return view('welcome');
    }

    //trang san pham mới, lấy loại xe để check từng loại
    public function newcar()
    {
        $new_car = Car::distinct()->where('car_years', Carbon::now()->year)->get(['car_type']);
        return view('car.new_car', compact('new_car'));
    }

    //lấy dữ liệu new car chuyển sang json
    public function getNewCar(Request $request)
    {
        $getcar = Car::where('car_type', $request->car_type)->where('car_years', Carbon::now()->year)->get();

        return response()->json($getcar);
    }

    //lấy dữ liệu used car chuyen sang dang json
    public function getUsedCar(Request $request)
    {
        $getcar = Car::where('car_type', $request->car_type)->whereBetween('car_years', [2010, 2017])->get();
        return response()->json($getcar);
    }

    //trang san phẩm cũ
    public function usedcar()
    {
        $used_car = Car::whereBetween('car_years', [2010, 2017])->distinct()->get(['car_type']);

        return view('car.used_car', compact('used_car'));
    }

    //details car
    public function detail_car(Request $request, $id)
    {
        $detail_car = Car::where('id', $id)->first();
        $vehicle = Car::find($id)->getVehicle()->get();

        return view('car.detail_car', compact('detail_car', 'vehicle'));
    }


    public function findCar(Request $request)
    {
        $car = Car::find($request->carId);

        return response()->json($car);
    }

    // trang tin tức
    public function news()
    {
        $posts = Post::paginate(config('app.paginate'));
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
        }

        return view('post.news', compact('posts'));
    }

    //trỏ tới form search
    public function view_used_car_for_sale()
    {
        $car_sale = Car::distinct()->get(['car_type']);

        return view('search.used_car_for_sale', compact('car_sale'));
    }

    //so sanh
    public function compare()
    {
        $compare = Car::all();

        return view('compare.compare', compact('compare'));
    }

    public function getListCompare(Request $request)
    {
        if ($request->session()->has('compare_name') == true) {
            $list_compare = $request->session()->get('compare_name');
                foreach($list_compare as $key => $value) {
                    echo $value . "</br>";
                }
        }

        // return view('compare.compare_list', compact('compare'));
    }

    public function compareAdd(Request $request)
    {
        if ($request->session()->has('compare_name') == false) {
            $request->session()->put('compare_name', array());
        }
        $request->session()->push('compare_name', $request->compare_id);
        if ($request->ajax()) {

            return response()->json([
                // 'message'    =>    'Chọn thành công',
                'redirect'    =>    '/compare-list',
            ]);
        }
    }

    public function compareDeleteAll(Request $request)
    {
        if ($request->session()->has('compare_name')) {
            $request->session()->forget('compare_name');
        }
        return redirect('/compare-list');
    }

    public function compareDeleteItem(Request $request)
    {
        // dd($request->all());
        // return response()->json($request->all());
        // $remove = $request->id;
            if ($request->session()->has('compare_name')) {
                $del_item = $request->session()->get('compare_name');
                if (in_array($request->id, $del_item)) {
                    foreach($del_item as $key => $value) {
                        if ($value == $request->id) {
                            $request->session()->forget($del_item[$key]);
                        }
                    }
                    $request->session()->put('compare_name', $del_item);
                }
                dd($del_item);
            }
        // if ($request->session()->has('compare_name')) {
        //     $del_item = $request->session()->get('compare_name');
        //     foreach ($del_item as $key => $value) {
        //         if($value = $remove) {
        //             $request->session()->pull('compare_name.'.$key);
        //         }
        //         break;
        //     }
        // }
        // if($request->session()->has('compare_name')){
        // $i=0;
        // $remove = $request->id;
        // $compare = $request->session()->get('compare_name');
        //     foreach ($request->session()->get('compare_name') as $index=> $compare) {
        //         if($compare == $remove){
        //          unset($compare[$index]);
        //            $i=1;
        //             break;
        //               }
        //              }
        // if($r==1){
        //     $request->session()->set('compare_name', $compare);
        //     echo 'Removed !!';
        //     }
        // }
        // dd($del_item);
    }

    //lấy slug chuyên mục
    public function categories($cateSlug)
    {
        $cate = Category::where('slug', $cateSlug)->first();
        $posts = Post::where('cate_id', $cate->id)->paginate();

        return view('post.cate_detail', compact('posts', 'cate'));
    }

    //bài viết
    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('post.news_detail', compact('post'));
    }

    //Thay doi ngon ngu
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}

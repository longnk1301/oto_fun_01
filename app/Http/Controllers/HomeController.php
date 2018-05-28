<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Car;
use App\Models\Category;
use App\Models\Vehicle;
use Cart;
use App\User;
use App\Order;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Lang;


class HomeController extends Controller
{
    // trang chu
    public function homepage()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('user.customer.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember)
            || Auth::attempt(['email' => $request->name, 'password' => $request->password], $request->remember)) {
            return redirect()->route('homepage');
        } else {
            return back()->with('msg', Lang::get('auth.wrong_acc'));
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }

    public function getProfile()
    {
        $user = Auth::user();

        return view('user.customer.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->add = $request->add;
        $user->save();

        return redirect('user.profile')->with('msg', Lang::get('auth.success_info'));
    }

    public function getRegister()
    {
        return view('user.customer.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:11',
            'add' => 'required|string|min:4|max:255',
            'password' => 'required|string|min:6|max:32|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->add = $request->add;
        $user->save();

        return redirect('user.register')->with('msg', Lang::get('auth.suc_register'));
    }

    public function postCheckout(Request $request)
    {
        $order = new Order;
        $order->cus_name = $request->cus_name;
        $order->identification = $request->identification;
        $order->cus_zip = $request->cus_zip;
        $order->cus_phone = $request->cus_phone;
        $order->cus_add = $request->cus_add;
        $order->cus_email = $request->cus_email;
        $order->content = $request->content;
        $order->car_id = $request->car_id;
        $order->fill($request->all());
        $order->save();

        return redirect()->back()->with('msg', Lang::get('auth.thank'));
    }

    public function getOrderDetails()
    {

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
        $vehicle = Car::find($id)->vehicle()->get();

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

    public function getListCompare()
    {
        $content = Cart::content();
            if (!$content) {
               return view('user.admin.404');
            } else {
               return view('compare.compare_list', compact('content'));
            }
    }

    public function compareAdd(Request $request)
    {
        $cars = Car::where('id', $request->compare_id)->first();
        $vehicles = Vehicle::where('car_id', $cars->id)->first();
        Cart::add(array(
            'id' => $request->compare_id,
            'name' => $cars->car_name,
            'qty' => $cars->car_number,
            'price' => $cars->car_cost,
            'options' => array(
                            'img' => $cars->car_image,
                            'type' => $cars->car_type,
                            'year' => $cars->car_years,
                            'inColor' => $vehicles->interior_color,
                            'exColor' => $vehicles->exterior_color,
                            'trans' => $vehicles->transmission,
                            'engine' => $vehicles->engine,
                            'mileage' => $vehicles->mileage,
                            'fuel' => $vehicles->fuel_type,
                            'drive' => $vehicles->drive_type,
                            'mpg' => $vehicles->mpg
                          )));
    }

    public function compareDeleteAll(Request $request)
    {
        Cart::destroy();
        Cart::count();
    }

    public function compareDeleteItem(Request $request)
    {
        $id = $request->id;
        $rows = Cart::content();
        $rowId = $rows->where('id', $id)->first()->rowId;
        $item = Cart::remove($rowId);

        return response()->json($request->all());
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

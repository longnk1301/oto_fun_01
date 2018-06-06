<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Car;
use App\Models\Category;
use App\Models\Vehicle;
use App\Models\CarType;
use App\Models\Company;
use App\Models\ImagePost;
use App\Models\Operate;
use App\Models\Color;
use App\Models\Engine;
use App\Models\Exterior;
use App\Models\Size;
use App\Models\ImageCar;
use Cart;
use App\User;
use App\Models\Advisory;
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
        $advisory = new Advisory;
        $advisory->cus_name = $request->cus_name;
        $advisory->identification = $request->identification;
        $advisory->cus_phone = $request->cus_phone;
        $advisory->cus_add = $request->cus_add;
        $advisory->cus_email = $request->cus_email;
        $advisory->content = $request->content;
        $advisory->car_id = $request->car_id;
        $advisory->save();

        return redirect()->back()->with('msg', Lang::get('auth.thank'));
    }

    public function getOrderDetails()
    {

    }

    //trang san pham mới, lấy loại xe để check từng loại
    public function newcar()
    {
        $companys = Company::all();

        return view('car.new_car', compact('companys'));
    }

    //lấy dữ liệu new car chuyển sang json
    public function getNewCar(Request $request)
    {
        $getcar = Car::where('comp_id', $request->id_company)->where('car_year', Carbon::now()->year)->where('status', 'Public')->get();
        foreach ($getcar as $imgCar) {
            $imgCar['img'] = $imgCar->getImageCar()->first();
        }
        return response()->json($getcar);
    }

    //lấy dữ liệu used car chuyen sang dang json
    public function getUsedCar(Request $request)
    {
        $getcar = Car::where('comp_id', $request->id_company)->whereBetween('car_year', [2000, 2017])->where('status', 'Public')->get();
        foreach ($getcar as $imgCar) {
            $imgCar['img'] = $imgCar->getImageCar()->first();
        }
        return response()->json($getcar);
    }

    //trang san phẩm cũ
    public function usedcar()
    {
        $companys = Company::all();

        return view('car.used_car', compact('companys'));
    }

    //details car
    public function detail_car(Request $request, $id)
    {
        $detail_car = Car::where('id', $id)->first();
        $id_vehicle = Vehicle::where('car_id', $id)->pluck('id')->first();
        $operates = Operate::where('vehicle_id', $id_vehicle)->first();
        $colors = Color::where('id', $detail_car->color_id)->first();
        $engines = Engine::where('vehicle_id', $id_vehicle)->first();
        $exteriors = Exterior::where('vehicle_id', $id_vehicle)->first();
        $sizes = Size::where('vehicle_id', $id_vehicle)->first();
        $car_type = CarType::where('id', $id)->first();
        $companys = Company::where('id', $id)->first();
        $images = ImageCar::where('car_id', $id)->get();

        return view('car.detail_car', compact(
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


    public function findCar(Request $request)
    {
        $car = Car::find($request->carId);
        $car['img'] = $car->getImageCar()->first();

        return response()->json($car);
    }

    // trang tin tức
    public function news()
    {
        $parent_categories = Category::where('status', 'Public')->where('parent_id', -1)->get();
        $posts = Post::where('status', 'Public')->paginate(config('app.paginate'));
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
            $p['imgPost'] = $p->getImagePost()->first();
        }
        return view('post.news', compact('posts', 'parent_categories', 'categories'));
    }

    //trỏ tới form search
    public function view_used_car_for_sale()
    {
        return view('search.used_car_for_sale');
    }

    //so sanh
    public function compare()
    {
        $compare = Car::where('status', 'Public')->paginate(config('app.paginate'));
        foreach ($compare as $imgCar) {
            $imgCar['img'] = $imgCar->getImageCar()->first();
        }
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
        $img = ImageCar::where('car_id', $cars->id)->first();
        $type = CarType::where('id', $cars->type_id)->first();
        $company = Company::where('id', $cars->comp_id)->first();
        $color = Color::where('id', $cars->color_id)->first();
        $id_vehicle = Vehicle::where('car_id', $cars->id)->pluck('id')->first();
        $operates = Operate::where('vehicle_id', $id_vehicle)->first();
        $engines = Engine::where('vehicle_id', $id_vehicle)->first();
        $exteriors = Exterior::where('vehicle_id', $id_vehicle)->first();
        $sizes = Size::where('vehicle_id', $id_vehicle)->first();

        Cart::add(array(
            'id' => $request->compare_id,
            'name' => $cars->car_name,
            'qty' => $cars->car_number,
            'price' => $cars->car_cost,
            'options' => array(
                            'img' => $img->image,
                            'type' => $type->type,
                            'year' => $cars->car_year,
                            'color' => $color->color,
                            'company' => $company->com_name,
                            'tissue_men' => $operates->tissue_man,
                            'gear' => $operates->gear,
                            'engine_type' => $engines->engine_type,
                            'cylinder_capacity' => $engines->cylinder_capacity,
                            'max_capacity' => $engines->cylinder_capacity,
                            'drive_type' => $engines->drive_type,
                            'drive_style' => $engines->drive_style,
                            'locks_nearby' => $exteriors->locks_nearby,
                            'locks_remote' => $exteriors->locks_remote,
                            'turn_signal_light' => $exteriors->turn_signal_light,
                            'height' => $sizes->height,
                            'weight' => $sizes->weight,
                            'width' => $sizes->width,
                            'colc' => $sizes->colc,
                            'volume_fuel' => $sizes->volume_fuel
                          )));
    }

    public function compareDeleteAll(Request $request)
    {
        Cart::destroy();
        Cart::count();

        return redirect(route('compare'));
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
        $posts = Post::where('category_id', $cate->id)->where('status', 'Public')->paginate();
        foreach ($posts as $p) {
            $p['category_id'] = $p->getCate();
            $p['imgPost'] = $p->getImagePost()->first();
        }

        return view('post.cate_detail', compact('posts', 'cate'));
    }

    //bài viết
    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $images = ImagePost::where('post_id', $post->id)->get();
        $post['tags'] = $post->tags()->get();

        return view('post.news_detail', compact('post', 'images'));
    }

    //Thay doi ngon ngu
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}

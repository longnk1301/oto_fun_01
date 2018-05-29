<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Models\Car;
use App\Models\Vehicle;

class OrderController extends Controller
{
    public function getOrders(Request $request)
    {
        $keyword = $request->keyword;
        $fullUrl = $request->fullUrl();
        $pageSize = $request->pagesize == null ? 10 : $request->pagesize;
        $addPath = "";
        if (!$keyword) {
            $orders = Order::paginate($pageSize);
            $addPath .= "?pagesize=$pageSize";
            foreach ($orders as $order) {
                $order['vehicle'] = $order->getVehicle();
                $order['car_name'] = $order->getCar();
            }
        } else {
            $orders = Order::where('cus_name', 'like', "%$keyword%")->orwhere('cus_add', 'like', "%$keyword%")->paginate();
            $addPath .= "?keyword=$keyword&pagesize=$pageSize";
            foreach ($orders as $order) {
                $order['vehicle'] = $order->getVehicle();
                $order['car_name'] = $order->getCar();
            }
        }
        $orders->withPath($addPath);

        return view('user.admin.order.index', compact('orders', 'keyword', 'fullUrl', 'pageSize'));
    }

    public function save(Request $request)
    {
        if ($request->id) {
           $model = Order::find($request->id);
            if (!$model) {
                return view('user.admin.404');
            }
        } else {
            $model = new Order();
        }
        $model->fill($request->all());
        $model->status = $request->order_status;
        $model->save();

        return redirect()->route('order.index');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return view('user.admin.404');
        } else {
            $checked = $order->status;
            $vehicle = Vehicle::find($order->car_id);
            $car = Car::find($order->car_id);
        
            return view('user.admin.order.form', compact('checked', 'car', 'vehicle', 'order'));
        }
        $vehicle = Vehicle::all();
        $car = Car::all();

        return view('user.admin.order.form', compact('model', 'order', 'vehicle', 'car'));
    }

    public function remove($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return view('user.admin.404');
        } else {
            $order->delete();

            return redirect(route('order.index'));
        }
    }
}

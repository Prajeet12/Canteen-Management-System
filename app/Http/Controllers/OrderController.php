<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        // $data = Category::with('food')->get();
        $order = Order::latest()->get();
        return view('admin.order.orderhome', compact('order'));
    }

    public function generateorder(Request $request)
    {
        //take the latest first item
        $order = Order::latest()->first();
        $data = new Order;
        $data->customer_name = $request->customer_name;
        if ($order) {
            $data->order_no = $order->order_no + 1;
        } else {
            $data->order_no = 1;
        }
        $data->save();

        return redirect('/order')->with('success', 'Data Saved');
    }

    public function takeorder($id)
    {

        $data = Category::with('food')->get();
        $order = Order::with('orderitems.fooditem')->find($id);

        return view('admin.order.takeorder', compact('data', 'order'));

    }

    public function quantity(Request $request, $id)
    {

        $data = new OrderItem();
        $data->order_id = $request->order_id;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->food_id = $id;
        $data->total = $request->quantity * $request->price;
        $saved = $data->save();
        if ($saved) {
            $order = Order::find($request->order_id);
            $order->total_amt += $data->total;
            $order->update();
        }

        return redirect()->back()->with('success', 'Data Saved');

    }

    public function update(Request $request, $id)
    {

        $data = OrderItem::find($id);
        $total = $data->total;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->total = $request->quantity * $request->price;
        $saved = $data->save();
        if ($saved) {
            $order = Order::find($data->order_id);
            $order->total_amt -= $total;
            $order->total_amt += $data->total;
            $order->update();
        }

        return redirect()->back()->with('success', 'Data is Updated');

    }






}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;
use App\Models\Contact;

class OrderController extends Controller
{
    public function index()
    {
        //$data = Category::with('food')->get();
        $order = Order::latest()->get();
        $order = Order::orderBy('id', 'desc')->paginate(5);
        $totalOrders = Order::count();
        $totalContacts = Contact::count();
        
        // Calculate total amount of all orders
        $mostOrderedFood = OrderItem::select('food_id', \DB::raw('SUM(quantity) as quantity'))
            ->groupBy('food_id')
            ->orderByDesc('quantity')
            ->first();

        if ($mostOrderedFood) {
            $foodTitle = Food::find($mostOrderedFood->food_id)->title;
            $totalQuantity = $mostOrderedFood->quantity;
            // Now $foodTitle holds the title of the most ordered food item
            // You can pass $foodTitle to your view for display
        } else {
            // Handle case where no most ordered food is found
            $foodTitle = "No  food found";
            $totalQuantity = 0;
        }

        $totalAmount = OrderItem::sum('total');
        return view('admin.order.orderhome', compact('order','totalOrders','totalContacts','totalAmount','foodTitle','mostOrderedFood','totalQuantity'));
    }





    

    // Controller function to generate a new order
    public function generateOrder(Request $request)
    {
        // Retrieve the order with the highest ID (latest order)
        $order = Order::orderBy('id', 'desc')->first();

        $data = new Order;
        $data->customer_name = $request->customer_name;

        if ($order) {
            $data->order_no = $order->order_no + 1;
        } else {
            $data->order_no = 1;
        }

        $data->save();

        return redirect('/order')->with('success', 'Order generated successfully');
    }

    public function searchorder(Request $request)
    {
        $search = $request->search;
        // $order = Order::latest()->first();
        
        $order = Order::with('orderitems.fooditem')->find($request->order);
        $data = Food::where(function ($query) use ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        })->get();
            // ->orWhereHas('category', function ($query) use ($search) {
            //     $query->where('category_id', 'like', "%$search%");

            // })->get();

        // return $data;

        return view('admin.order.takeorder', compact('order', 'data', 'search'));
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

        // Calculate VAT (13%)
        $vatPercentage = 5;
        $vatAmount = ($data->total * $vatPercentage) / 100;

        // Calculate grand total with VAT
        $grand_total = $data->total + $vatAmount;

        $saved = $data->save();
        if ($saved) {
            $order = Order::find($request->order_id);
            $order->total_amt += $grand_total; // Add grand total with VAT
            $order->vat_amount += $vatAmount; // Add VAT to the order's VAT total
            $order->grand_total = $order->total_amt + $order->vat_amount; // Calculate grand total including VAT
            $order->update();
        }

        return redirect()->back()->with('success', 'Data Saved');
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);

        // Find associated order items for the order
        $orderItems = OrderItem::where('order_id', $id)->get();

        // Calculate and accumulate VAT and total amounts from order items
        $vatPercentage = 5;
        $totalVatAmount = 0;
        $totalOrderItemTotal = 0;

        foreach ($orderItems as $orderItem) {
            $orderItemTotal = $orderItem->total;
            $totalOrderItemTotal += $orderItemTotal;

            $vatAmount = ($orderItemTotal * $vatPercentage) / 100;
            $totalVatAmount += $vatAmount;
        }

        // Subtract accumulated VAT and total amounts from the order
        $order->vat_amount -= $totalVatAmount;
        $order->grand_total -= $totalOrderItemTotal;
        $order->total_amt -= $totalOrderItemTotal;

        // Delete associated order items
        OrderItem::where('order_id', $id)->delete();

        // Delete the order itself
        $order->delete();

        return redirect()->back()->with('deleted', 'Order and associated items are deleted.');
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

    public function deleteOrderItem($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $order = Order::find($orderItem->order_id);

        $orderItemTotal = $orderItem->total;

        // Calculate VAT (5%)
        $vatPercentage = 5;
        $vatAmount = ($orderItemTotal * $vatPercentage) / 100;

        // Subtract the VAT amount from the order's VAT total
        $order->vat_amount -= $vatAmount;

        // Subtract the item's total (including VAT) from the grand total
        $order->grand_total -= $orderItemTotal;

        // Subtract the item's total (including VAT) from the order's total amount
        $order->total_amt -= $orderItemTotal;

        $orderItem->delete();
        $order->save();

        return redirect()->back()->with('success', 'Data is Deleted.');
    }








}
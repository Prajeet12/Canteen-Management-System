<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;
use App\Models\Contact;
use App\Models\Payment;

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

        $totalAmount = Order::sum('total_amt');

        return view('admin.order.orderhome', compact('order', 'totalOrders', 'totalContacts', 'totalAmount', 'foodTitle', 'mostOrderedFood', 'totalQuantity'));
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

        return redirect()->route('takeorder', ['id' => $data->id])->with('success', 'Order generated successfully');
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
        // Search for orders based on customer names
        $orders = Order::where('customer_name', 'like', "%$search%")->get();
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
        $payments = Payment::all();

        return view('admin.order.takeorder', compact('data', 'order', 'payments'));

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
        $vatPercentage = 13;
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
        $vatPercentage = 13;
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
        $oldTotal = $data->total; // Store the old total amount

        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->total = $request->quantity * $request->price;

        // Calculate VAT (13%)
        $vatPercentage = 13;
        $vatAmount = ($data->total * $vatPercentage) / 100;

        // Update VAT amount for the item
        $data->vat_amount = $vatAmount;
        $grand_total = $data->total + $vatAmount;
        $saved = $data->save();

        if ($saved) {
            // Find the associated order
            $order = Order::find($data->order_id);

            // Calculate old VAT amount for the item
            $oldVatAmount = ($oldTotal * $vatPercentage) / 100;

            // Update order totals based on changes in the item
            $order->total_amt -= ($oldTotal + $oldVatAmount); // Subtract the old item total and old VAT amount
            $order->total_amt += $grand_total; // Add the new item total
            $order->vat_amount -= $oldVatAmount; // Subtract old VAT amount
            $order->vat_amount += $vatAmount; // Add new VAT amount

            // Update the grand total of the order
            $order->grand_total = $order->total_amt + $order->vat_amount;
            $order->save(); // Save changes to the order
        }

        return redirect()->back()->with('success', 'Data is Updated');
    }




    public function deleteOrderItem($id)
    {
        $orderItem = OrderItem::find($id);
        $order = Order::find($orderItem->order_id);

        if ($orderItem) {
            // Subtract values from the order when deleting an item
            $vatAmount = ($orderItem->total * 13) / 100; // Assuming VAT percentage is 5%
            $order->total_amt -= ($orderItem->total + $vatAmount); // Subtract the total with VAT from the order's total
            $order->vat_amount -= $vatAmount; // Subtract VAT from the order's VAT total
            $order->grand_total = $order->total_amt + $order->vat_amount; // Recalculate the grand total including VAT

            $order->update();

            $orderItem->delete(); // Delete the order item
        }

        return redirect()->back()->with('success', 'Data Deleted');

    }




    public function generateInvoice(Request $request, $id)
    {
        // Fetch the specific order data based on the provided order ID
        $order = Order::findOrFail($id);
        $order->method_id = $request->method;
        $order->update();
        // Calculate subtotal, tax, total, etc., based on the retrieved order data
        $subtotal = $order->total_amt - $order->vat_amount;
        $tax = $order->vat_amount;
        $total = $order->total_amt;

        return view('admin.order.bill', [
            'customerName' => $order->customer_name,
            'orderNumber' => $order->order_no,
            'orderItems' => $order->orderitems()->get()->map(function ($item) {
                return [
                    'title' => $item->fooditem->title,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'total' => $item->total  // Include VAT in the total
                ];
            }),
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'method' => $order->method->method
        ]);
    }


}
<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function viewinvoice($id)
    {
        $order = Order::findOrFail($id);
        $subtotal = $order->total_amt - $order->vat_amount;
        $tax = $order->vat_amount;
        $total = $order->total_amt;


        return view('admin.order.viewinvoice', [
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
            'invoice_number' => $order->invoice_number,
            'method' => $order->method->method,
            'invoice_date' => Carbon::parse($order->invoice_date)->format('l, d F Y, h:i A'), // Fetch invoice date time from $order object
        ]);
    }
}

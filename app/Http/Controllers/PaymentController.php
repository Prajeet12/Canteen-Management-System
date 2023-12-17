<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments =Payment::all();
        return view('admin.Payment.payment', compact('payments')); 
    }
    public function add(Request $request)
    {
        $payments = new Payment;
        $payments->method = $request->method;
        $payments->save();
        return redirect('/payment')->with('success', 'Data Saved');
    }

    public function update(Request $request, $id)
    {
        $data = Payment::find($id);

        $data->method = $request->method;
        $data->save();

        return redirect('/payment')->with('success', 'Data is Updated.');


    }

    public function delete($id)
    {
        $data = Payment::find($id);
        $data->delete();
        return redirect()->back()->with('deleted', 'Data is Deleted.');


    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Vat;

class VATController extends Controller
{

    public function index()
    {
        $vats = Vat::all(); // Get the latest VAT percentage
        $payments = Payment::all();
        return view('admin.payment.payment', compact('vats', 'payments'));
    }
   



    public function updatevat(Request $request, $id)
    {

        $data = Vat::find($id);
        
        $data->percentage = $request->percentage;
        
        $data->save();
        return redirect('/payment')->with('success', 'Data is Updated.');
    
    }

}

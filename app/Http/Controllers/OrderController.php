<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function index(){
    return view('admin.order.orderhome');
   }
    public function breakfast()
    {
        return view('admin.order.breakfast');
    }
}

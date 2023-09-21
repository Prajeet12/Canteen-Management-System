<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('admin.adminhome');
            } else if ($usertype == 'Admin') {
                return view('admin.adminhome');
            } else {
                return redirect();
            }
        }
    }
    public function create()
    {
        return view('admin.add');
    }

    public function menu()
    {
        $data = Category::with('food')->get();
        return view('client.master', compact('data'));
    }


    public function viewcategory($category_name)
    {
        if (Food::where('category_name', $category_name)->exists()) {
            $special = Food::where('category_name', $category_name)->first();
            $categories = Category::where('cate_id', $special->id)->where('status', '0')->get();
            return view('client.food', compact('special', 'categories'));

        } else {
            return redirect('/')->with('status', "Not Found");
        }
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    public function add(Request $request)
    {
        $categories = new Category;
        $categories->category_name = $request->category_name;
        $categories->save();
        return redirect('/category')->with('success', 'Data Saved');
    }

    public function update(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category_name;
        $data->save();

        return redirect('/category')->with('success', 'Data is Updated.');


    }

    public function delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data is Deleted.');


    }
}
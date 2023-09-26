<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    public function menu()
    {
        $categories = Category::all();
        $menus = Food::with('category')->get();
        return view('admin.food.foodmenu', compact('menus', 'categories'));
    }

    

    public function add(Request $request)
    {
        $data = new food;
        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect('/menu')->with('success', 'Data Saved');

    }

    public function update(Request $request, $id)
    {
        $data = Food::find($id);
        $image = $request->image;

        if ($image) {
            $path = public_path('foodimage/' . $data->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image = $imagename;

        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect('/menu')->with('success', 'Data is updated.');


    }
    public function delete($id)
    {
        $special = Food::find($id);
        $path = public_path('foodimage/' . $special->image);
        if (File::exists($path)) {
            File::delete($path);
        }
        $special->delete();
        return redirect()->back();


    }

}
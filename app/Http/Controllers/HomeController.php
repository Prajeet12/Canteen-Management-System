<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Food;
use App\Models\Category;
use App\Models\Aboutus;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                return view('admin.dashboard');
            } else if ($usertype == 'Admin') {
                return view('admin.dashboard');
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
        $abouts = Aboutus::all(); // Fetch 'abouts' data
        return view('client.master', compact('data', 'abouts')); // Pass both 'data' and 'abouts' to the view
    }

    public function about()
    {
        $hero = Aboutus::all();
        return view('admin.aboutus.about', compact('hero'));
    }
    public function addabout(Request $request)
    {
        $abouts = new aboutus;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $abouts->image = $imagename;

        $abouts->title = $request->title;

        $abouts->description = $request->description;
        $abouts->save();

        return redirect('/aboutus')->with('success', 'Data Saved');
    }

    public function update(Request $request, $id)
    {
        $abouts = Aboutus::find($id);
        $image = $request->image;

        if ($image) {
            $path = public_path('foodimage/' . $abouts->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $abouts->image = $imagename;
        $abouts->title = $request->title;
        $abouts->description = $request->description;
        $abouts->save();
        return redirect('/aboutus')->with('success', 'Data is updated.');


    }

}
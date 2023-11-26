<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Food;
use App\Models\Category;
use App\Models\Aboutus;
use App\Models\Home;

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
        $galleries= Gallery::all();
        $homes= Home::all();
        return view('client.master', compact('data', 'abouts', 'galleries','homes')); // Pass both 'data' and 'abouts' to the view
    }

    public function about()
    {
        $hero = Aboutus::all();
        return view('admin.aboutus.about', compact('hero'));
    }
    public function addabout(Request $request)
    {
        $about = new AboutUs; // Assuming 'AboutUs' is your model

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // Adjust file type and size validation as needed
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        // Handle image uploads
        $imagePaths = [];

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1Name = time() . '_' . $image1->getClientOriginalName();
            $image1->move('foodimage', $image1Name);
            $imagePaths['image1'] = $image1Name;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2Name = time() . '_' . $image2->getClientOriginalName();
            $image2->move('foodimage', $image2Name);
            $imagePaths['image2'] = $image2Name;
        }

        // Create and save the 'aboutus' record
        $about = new AboutUs;

        $about->title = $validatedData['title'];
        $about->description = $validatedData['description'];
        $about->image1 = $imagePaths['image1'] ?? null;
        $about->image2 = $imagePaths['image2'] ?? null;

        $about->save();

        return redirect('/aboutus')->with('success', 'Data Saved');

    }


    public function update(Request $request, $id)
    {
        $about = Aboutus::find($id);

        if (!$about) {
            // Handle the case where the record is not found, e.g., show an error message or redirect
        }

        // Check if a new 'image2' file has been provided in the request
        if ($request->hasFile('image2')) {
            // Delete the old 'image2' file, if it exists
            $oldImage2Path = public_path('foodimage/' . $about->image2);
            if (File::exists($oldImage2Path)) {
                File::delete($oldImage2Path);
            }

            // Upload the new 'image2' file
            $newImage2 = $request->file('image2');
            $newImage2Name = time() . '.' . $newImage2->getClientOriginalExtension();
            $newImage2->move('foodimage', $newImage2Name);

            // Update the 'image2' field in the database
            $about->image2 = $newImage2Name;
        }

        // Update other fields
        $about->title = $request->input('title');
        $about->description = $request->input('description');
        $about->save();

        return redirect('/aboutus')->with('success', 'Data is updated.');
    }


    public function clienthome()
    {
        $homes = Home::all();

        return view('admin.clienthome', compact('homes'));
    }

    public function addclienthome(Request $request)
    {
        $homes = new home;

        $image = $request->image;

        $homeimage = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $homeimage);
        $homes->image = $homeimage;
        $homes->title = $request->input('title');
        $homes->description = $request->input('description');
        $homes->save();

        return redirect('/aboutus')->with('success', 'Data Saved');
    }

    public function updateclienthome(Request $request, $id)
    {
        $homes = Home::find($id);
        $image = $request->image;

        if ($image) {
            $path = public_path('foodimage/' . $homes->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $homeimage = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $homeimage);

        $homes->image = $homeimage;
        $homes->title = $request->input('title');
        $homes->save();
        return redirect('/clienthome')->with('success', 'Data is updated.');


    }
    public function gallery()
    {
        $galleries = Gallery::all();

        return view('admin.gallery', compact('galleries'));
    }

    public function addgallery(Request $request)
    {
        $galleries = new gallery;

        $image = $request->image;

        $galleryimage = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $galleryimage);
        $galleries->image = $galleryimage;
        $galleries->save();

        return redirect('/gallery')->with('success', 'Data Saved');
    }

    public function updategallery(Request $request, $id)
    {
        $galleries = Gallery::find($id);
        $image = $request->image;

        if ($image) {
            $path = public_path('foodimage/' . $galleries->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $galleryimage = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $galleryimage);

        $galleries->image = $galleryimage;

        $galleries->save();
        return redirect('/gallery')->with('success', 'Data is updated.');


    }
    
    public function deleteGallery($id)
    {
        $galleryItem = Gallery::findOrFail($id);
        // Delete the image from storage if needed
        // Storage::delete('foodimage/' . $galleryItem->image);

        $galleryItem->delete();
        return redirect()->back()->with('success', 'Data is Deleted.');
    }


}
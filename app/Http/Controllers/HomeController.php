<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Food;


class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                return view('admin.adminhome');
            }
            else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect();
            }
        }
    }

  
    public function foodmenu()
    {
        $special=Food::get();
        return view('admin.foodmenu',compact('special'));
    }

    public function breakfastmenu()
    {
        
        return view('admin.breakfastmenu');
    }
    public function upload(Request $request)
    {
        $data = new food;
        $image= $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        
        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();

        return redirect('/foodmenu')->with('success','Data Saved');

        

    }
    public function menu(){
        $data=Food::get();
        return view('client.master',compact('data'));
    }

    public function deletemenu($id)
    {
$special=Food::find($id);
$special->delete();
return redirect()->back();


    }
    public function updateview($id)
    {
        $data=Food::find($id);
        return view('admin.updateview',compact('data'));

    }
    public function update(Request $request,$id)
    {
        $data=Food::find($id);
        $image= $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        
        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();

        return redirect('/foodmenu')->with('success','Data Saved');

        
    }
  
}

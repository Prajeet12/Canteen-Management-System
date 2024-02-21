<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;
use App\Models\Vat;
use App\Models\QrImage;
use Illuminate\Support\Facades\File;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('qrimage')->get();
        $vats = Vat::all();
        // $qrimage = QrImage::all();
        $totalAmount = Order::sum('total_amt');
        // Calculate total sum done by Khalti method
        // $totalKhaltiSum = Order::where('method_id', 2)->sum('total_amt');

        // // Calculate total sum done by Cash method
        // $totalCashSum = Order::where('method_id', 1)->sum('total_amt');
        
        $totalMethodSum = Order::select('method_id', DB::raw('SUM(grand_total) as total_sum'))->groupBy('method_id')->with('method')->get();

        $invoiceDateTime = Carbon::now()->format('Y-m-d H:i:s');
        return view('admin.Payment.payment', compact('vats', 'payments', 'invoiceDateTime', 'totalAmount', 'totalMethodSum'));
    }
    public function add(Request $request)
    {
        $payments = new Payment;
        $payments->method = $request->method;
        $payments->save();

        $qrimage = new QrImage();
        $qrimage->method_id = $payments->id;
        $image = $request->qrimage;
        $qr_image = time() . '.' . $image->getClientOriginalExtension();
        $request->qrimage->move('foodimage', $qr_image);
        $qrimage->qrimage = $qr_image;
        $qrimage->save();
        return redirect('/payment')->with('success', 'Data Saved');
    }

    public function update(Request $request, $id)
    {
        $data = Payment::find($id);

        $data->method = $request->method;
        $data->save();

        if ($request->hasFile('qrimage')) {
            $qrimage = QrImage::where('method_id', $id)->first();
            $image = $request->qrimage; 

            if ($image) {
                $path = public_path('foodimage/' . $qrimage->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $qr_image = time() . '.' . $image->getClientOriginalExtension();
            $request->qrimage->move('foodimage', $qr_image);

            $qrimage->qrimage = $qr_image;
            $qrimage->save();
        }


        return redirect('/payment')->with('success', 'Data is Updated.');


    }

    public function delete($id)
    {

        $qrImage = QrImage::where('method_id',$id)->first();

        if ($qrImage) {
            // Delete the image file from storage
            File::delete(public_path('foodimage/' . $qrImage->qrimage));

            // Delete the record from the database
            $qrImage->delete();

        }
        $data = Payment::find($id);
        $data->delete();

        return redirect()->back()->with('deleted', 'Data is Deleted.');


    }



    // public function updateqrimage(Request $request, $id)
    // {
    //     // Fetch the existing QR image record
    //     $qrimage = QrImage::find($id);
    //     $image = $request->qrimage;

    //     if ($image) {
    //         $path = public_path('foodimage/' . $qrimage->image);
    //         if (File::exists($path)) {
    //             File::delete($path);
    //         }
    //     }
    //     $qr_image = time() . '.' . $image->getClientOriginalExtension();
    //     $request->qrimage->move('foodimage', $qr_image);

    //     $qrimage->qrimage = $qr_image;


    //     $qrimage->save();
    //     return redirect('/payment')->with('success', 'Data is updated.');
    // }

    // public function destroy($id)
    // {
    //     // Fetch the QR image record
    //     $qrImage = QrImage::find($id);

    //     if ($qrImage) {
    //         // Delete the image file from storage
    //         File::delete(public_path('foodimage/' . $qrImage->image_path));

    //         // Delete the record from the database
    //         $qrImage->delete();

    //         return redirect('/payment')->with('success', 'Image Deleted Successfully');
    //     }

    //     return redirect('/payment')->with('error', 'Image Delete Failed');
    // }


}


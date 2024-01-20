<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;
use App\Models\Vat;
use App\Models\QrImage;
use Illuminate\Support\Facades\File;
use App\Models\Order;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        $vats = Vat::all();
        $qrimage = QrImage::all();
        $totalAmount = Order::sum('total_amt');
        // Calculate total sum done by Khalti method
        $totalKhaltiSum = Order::where('method_id', 2)->sum('total_amt');

        // Calculate total sum done by Cash method
        $totalCashSum = Order::where('method_id', 1)->sum('total_amt');

       // dd($totalKhaltiSum, $totalCashSum);
        $invoiceDateTime = Carbon::now()->format('Y-m-d H:i:s');
        return view('admin.Payment.payment', compact('qrimage','vats', 'payments', 'invoiceDateTime','totalAmount','totalKhaltiSum','totalCashSum'));
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



    public function updateqrimage(Request $request, $id)
    {
        // Fetch the existing QR image record
        $qrimage = QrImage::find($id);
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
        return redirect('/payment')->with('success', 'Data is updated.');
    }

    public function destroy($id)
    {
        // Fetch the QR image record
        $qrImage = QrImage::find($id);

        if ($qrImage) {
            // Delete the image file from storage
            File::delete(public_path('foodimage/' . $qrImage->image_path));

            // Delete the record from the database
            $qrImage->delete();

            return redirect('/payment')->with('success', 'Image Deleted Successfully');
        }

        return redirect('/payment')->with('error', 'Image Delete Failed');
    }


}


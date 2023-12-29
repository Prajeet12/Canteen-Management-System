<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInformation;

class ContactInformationController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInformation::first(); // Assuming only one record exists

        return view('admin.contact', compact('$contactInfo'));
    }

    public function edit(Request $request)
    {
        $contactInfo = new ContactInformation;

        $contactInfo->address = $request->address;
        $contactInfo->contactEmail = $request->contactEmail;
        $contactInfo->openingTime = $request->openingTime;
        $contactInfo->phoneNumber = $request->phoneNumber;
        $contactInfo->save();

        return redirect('/')->with('success', 'Data Saved');

    }

    public function update(Request $request, $id)
    {
        $contactInfo = ContactInformation::find($id);
        

        $contactInfo->address = $request->address;
        $contactInfo->contactEmail = $request->contactEmail;
        $contactInfo->openingTime = $request->openingTime;
        $contactInfo->phoneNumber = $request->phoneNumber;
        $contactInfo->save();

        return redirect('/contact')->with('success', 'Data Updated successfully');
    }
}

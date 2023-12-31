<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\ContactInformation;

class ContactController extends Controller
{
  public function sendmessage()
  {
    $contact = Contact::all();
    $data=Contact::paginate(3);
    $totalContacts= Contact::count();
    $contactInfo = ContactInformation::all();
    return view('admin.contact', compact('contact','data','contactInfo'));
  }
  // Handle form submission
  public function submitContactForm(Request $request)
  {
    // Validate the form data
    // return $request->all();
    $data = new Contact();


    $data->name = $request->name;
    $data->email = $request->email;
    $data->subject = $request->subject;
    $data->message = $request->message;
    $data->save();
    // Redirect back with a success message
    return redirect()->back()->with('success', 'Message sent successfully!');
  }
}





<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    // // Show the contact form
    // public function showForm()
    // {
    //     return view('landing');
    // }

    // Handle form submission
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Optional: Send email logic
        // Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));
        Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));

        return redirect()->route('landing')->with('success', 'Your message has been sent successfully.');
    }
}

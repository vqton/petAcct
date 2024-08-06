<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function submit(ContactFormRequest $request)
    {
        $data = $request->validated();

        Mail::to(config('mail.from.address'))->send(new ContactMail($data));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Testimonial;

class LandingController extends Controller
{
    //
    public function index()
    {
        $testimonials = Testimonial::all();
        $services = Service::all();
        return view('landing', compact('services', 'testimonials'));
    }
}

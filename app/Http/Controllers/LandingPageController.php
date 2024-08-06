<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
class LandingPageController extends Controller
{
    public function index()
    {
        // Fetch all services from the database
        $services = Service::all();

        // Pass the services data to the view
        return view('landing', compact('services'));
    }
}

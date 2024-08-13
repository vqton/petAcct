<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('landing');
// });
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');
Route::resource('services', ServiceController::class);
Auth::routes();
// Contact form submission route

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact form submission route (POST)
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

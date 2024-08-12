<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\UserController;

Route::resource('services', ServiceController::class);

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    
    // Logout Route
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

Route::get('/', [LandingPageController::class, 'index']);


// Route::get('/', function () {
//     return view('landing');
// });

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

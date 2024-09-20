<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomsController;

Route::resource('activities', ActivitiesController::class);

// web.php
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/aboutus', function () {
    return view('pages.aboutus');
})->name('about');

Route::get('/rooms', function () {
    return view('pages.rooms');
})->name('rooms');

Route::get('/rooms/{id}', [RoomsController::class, 'show'])->name('rooms.show');

Route::get('/offers', function () {
    return view('pages.offers');
})->name('offers');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/roomdetails', function () {
    return view('pages.roomdetails');
})->name('roomdetails');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

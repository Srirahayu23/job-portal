<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('guest', [GuestController::class, 'index']);
Route::get('about', [GuestController::class, 'about']);
Route::get('contact', [GuestController::class, 'contact']);
Route::get('/job_listing', [GuestController::class, 'job_listing']);

//untuk frontend
// Route::get('/', [GuestController::class, 'index'])->name('home');
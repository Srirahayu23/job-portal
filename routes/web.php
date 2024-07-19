<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('administrator/dashboard', [ApplicantController::class, 'index'])->name('admin.apply-job');

Route::get('guest', [GuestController::class, 'index']);
Route::get('about', [GuestController::class, 'about']);
Route::get('contact', [GuestController::class, 'contact']);
Route::get('/job_listing', [GuestController::class, 'job_listing']);
Route::get('/job_details', [GuestController::class, 'job_details']);

//untuk frontend
// Route::get('/', [GuestController::class, 'index'])->name('home');
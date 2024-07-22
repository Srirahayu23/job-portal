<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Sebelum user loginn
Route::get('about', [GuestController::class, 'about']);
Route::get('contact', [GuestController::class, 'contact']);
Route::get('/job_listing', [GuestController::class, 'job_listing']);
Route::get('/job_details', [GuestController::class, 'job_details']);
Route::get('/job-details/:id', [GuestController::class, 'jobDetails']);
Route::get('/form_apply', [GuestController::class, 'form_apply']);
Route::post('/form_apply', [GuestController::class, 'form_apply']);

// untuk admin
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function job_listing()
    {
        return view('job_listing');
    }
    
    public function job_details()
    {
        return view('job_details');
    }

    public function contact()
    {
        return view('contact');
    }
}

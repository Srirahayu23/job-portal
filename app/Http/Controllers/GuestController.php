<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ApplyJob;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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
        // $job = Job::all()->orderBy('created_at', 'desc');
        $job = Job::latest()->get();
        $data = [
            'job' => $job,
        ];

        return view('job_listing', $data);
    }

    public function job_details()
    {
        return view('job_details');
    }

    public function jobDetails(string $id): View
    {
        //get by ID
        $job = Job::findOrFail($id);
        $data = [
            'job' => $job
        ];
        //render view with post
        return view('guest.job_details', $data);
    }

    public function contact()
    {
        return view('contact');
    }
    public function form_apply()
    {
        return view('form_apply');
    }

    public function form_submit(Request $request)
    {
        //     $table->string('name', 255);
        //     $table->string('email')->unique();
        //     $table->string('desc', 255);
        //     $table->string('address', 255);
        //     $table->string('lastEducation', 255);
        //     $table->float('ipk');
        //     $table->string('phoneNumber', 13);
        //     $table->string('image');
        //     $table->string('skill', 255);
        //     $table->string('ktp');
        //     $table->string('cv');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'desc' => 'required',
            'address' => 'required',
            'lastEducation' => 'required',
            'phoneNumber' => 'required',
            'ipk' => 'required',
            'skill' => 'required',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'ktp' => 'required|mimes:pdf,doc,docx|max:2048',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/applicant', $image->hashName());

        $cv = $request->file('cv');
        $cv->storeAs('public/applicant', $cv->hashName());

        $ktp = $request->file('ktp');
        $ktp->storeAs('public/applicant', $ktp->hashName());

        $applicant = Applicant::create([
            'name' => $request->name,
            'email' => $request->email,
            'desc' => $request->desc,
            'address' => $request->address,
            'lastEducation' => $request->lastEducation,
            'phoneNumber' => $request->phoneNumber,
            'ipk' => $request->ipk,
            'skill' => $request->skill,
            'cv' => $cv->hashName(),
            'ktp' => $ktp->hashName(),
            'image' => $image->hashName(),
        ]);

        // $table->id();
        // $table->foreignId('job_id')->constrained()->onDelete('cascade');
        // $table->foreignId('applicant_id')->constrained()->onDelete('cascade');
        // $table->string('status', 255);
        ApplyJob::create([
            'applicant_id' => $applicant->id,
            'job_id' => $request->job_id,
            'status' => ['Pending', 'Accepted', 'Rejected', 'Additional Status'],
        ]);
    }
}

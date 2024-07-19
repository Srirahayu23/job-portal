<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicant['applicant'] = Applicant::latest()->get();
        return view('admin.apply-job.index', $applicant);
    }
    public function create()
    {
        return view('admin.apply-job.create');
    }
}

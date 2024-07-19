<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ApplyJob()
    {
        return $this->belongsTo(ApplyJob::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}

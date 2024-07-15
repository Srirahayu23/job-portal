<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobCategory;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }
}
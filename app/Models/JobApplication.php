<?php

namespace App\Models;

use App\Enums\JobApplicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_listing_id'
    ];

    public function candidate()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }

    public function applyJob()
    {
        return $this->belongsTo(ApplyJob::class, 'job_listing_id', 'job_listing_id');
    }
}

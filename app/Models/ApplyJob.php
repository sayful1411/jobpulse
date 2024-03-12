<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ApplyJob extends Pivot
{
    use HasFactory;

    protected $table = 'apply_jobs';

    protected $fillable = [
        'user_id', 
        'job_id', 
        'name', 
        'experience', 
        'expected_salary'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(JobListing::class);
    }
}

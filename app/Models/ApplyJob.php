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
        'job_listing_id', 
        'name', 
        'experience', 
        'expected_salary',
        'status'
    ];

    protected $casts = [
        'expiration_date' => 'datetime',
    ];

    public function candidate()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }
}

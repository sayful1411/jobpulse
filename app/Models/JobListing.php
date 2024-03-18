<?php

namespace App\Models;

use App\Enums\JobApplicationStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'description',
        'min_salary',
        'max_salary',
        'vacancy',
        'experience',
        'expiration_date',
        'job_type',
        'location',
    ];

    protected $casts = [
        'expiration_date' => 'datetime',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function candidates()
    {
        return $this->belongsToMany(User::class, 'apply_jobs', 'job_listing_id', 'user_id')
            ->using(ApplyJob::class)
            ->withPivot('name', 'experience', 'expected_salary', 'status')
            ->withTimestamps();
    }

    public function jobApplications()
    {
        return $this->hasMany(ApplyJob::class, 'job_listing_id');
    }

    public function approvedApplicationsCount(): int
    {
        return $this->jobApplications()->where('status', JobApplicationStatus::APPROVED)->count();
    }

    public function rejectedApplicationsCount(): int
    {
        return $this->jobApplications()->where('status', JobApplicationStatus::REJECTED)->count();
    }

    public function appliedJobs()
    {
        return $this->hasMany(ApplyJob::class, 'job_listing_id');
    }

    public function isSavedByUser()
    {
        $user = Auth::user();
        if ($user) {
            return $user->savedJobs->pluck('id')->contains($this->id);
        }
        return false;
    }
}

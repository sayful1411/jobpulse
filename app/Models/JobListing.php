<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

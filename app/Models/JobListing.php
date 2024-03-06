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
        'description',
        'salary_range',
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
}
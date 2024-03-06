<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'salary_range',
        'expiration_date',
        'location',
    ];

    protected $casts = [
        'expiration_date' => 'datetime',
    ];
}

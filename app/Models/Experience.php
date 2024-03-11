<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'department',
        'join',
        'resign',
        'is_currently_working',
        'company_address',
        'responsibilities'
    ];

    protected $casts = [
        'join' => 'datetime',
        'resign' => 'datetime',
    ];
}

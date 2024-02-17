<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOthersInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'current_salary',
        'expected_salary'
    ];
}

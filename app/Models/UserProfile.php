<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'father_name',
        'mother_name',
        'date_of_birth',
        'gender',
        'blood_group',
        'nid',
        'phone_2',
        'website',
        'address',
        'bio'
    ];

    public function candidate()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'level',
        'degree_name',
        'major',
        'institute_name',
        'result',
        'passing_year'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

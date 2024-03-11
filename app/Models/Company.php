<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    protected $guard = 'company';

    public const PLACEHOLDER_IMAGE_PATH = 'avatar.png';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'industry_type',
        'license_no',
        'website',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'status' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getImageUrlAttribute()
    {
        return $this->hasMedia('company_avatar')
        ? $this->getFirstMediaUrl('company_avatar')
        : self::PLACEHOLDER_IMAGE_PATH;
    }

    public function jobs()
    {
        return $this->hasMany(JobListing::class);
    }
}

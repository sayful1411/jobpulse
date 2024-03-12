<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'provider_id',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public const PLACEHOLDER_IMAGE_PATH = 'avatar.png';

    public function getImageUrlAttribute()
    {
        return $this->hasMedia('candidate_avatar')
        ? $this->getFirstMediaUrl('candidate_avatar')
        : self::PLACEHOLDER_IMAGE_PATH;
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function skill()
    {
        return $this->hasOne(Skill::class);
    }

    public function othersInformation()
    {
        return $this->hasOne(UserOthersInformation::class);
    }

    public function socialAccountsInformation()
    {
        return $this->hasMany(UserSocialAccount::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(JobListing::class, 'apply_jobs')
            ->using(ApplyJob::class)
            ->withPivot('name', 'experience', 'expected_salary')
            ->withTimestamps();
    }
}

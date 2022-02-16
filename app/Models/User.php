<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
                    ? Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path)
                    : Storage::disk($this->profilePhotoDisk())->url("profile-photos/8Pp6LbA3opvtoUkBGt7GimilOtmpMTc0oxmK1TPI.png");
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function teachers() {
        return $this->hasMany(Teacher::class);
    }

    public function years() {
        return $this->hasMany(Year::class);
    }

    public function subjectsTeachers() {
        return $this->hasMany(SubjectTeacher::class);
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function sections() {
        return $this->hasMany(Section::class);
    }

    public function marks() {
        return $this->hasMany(Mark::class);
    }

    public function equations() {
        return $this->hasMany(Equation::class);
    }
}

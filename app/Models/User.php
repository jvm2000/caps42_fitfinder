<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'gender',
        'role',
        'birthdate',
        'tags',
        'image',
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
        'birthdate' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tags' => 'array'
    ];

    public function getAgeAttribute()
    {
        return $this->birthdate?->diffInYears(now());
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/'. $this->image);
        }
        return '/icons/settings/profile-icon.svg';
    }

    public function medcert()
    {
        return $this->hasOne(MedCert::class);
    }

    public function portfolio()
    {
        return $this->hasOne(Portfolio::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}

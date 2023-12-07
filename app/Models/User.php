<?php

namespace App\Models;

use App\Models\Program;
use App\Models\Contract;
use App\Models\Enrollee;
use App\Models\TransactionInfo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'address',
        'city',
        'province',
        'zip_code',
        'address',
        'city',
        'province',
        'zip_code',
        'gender',
        'verified',
        'role',
        'birthdate',
        'tags',
        'image',
        'status',
        'program_id',
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

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function requests()
    {
        return $this->hasMany(UserRequest::class);
    }
    
    public function enrollees()
    {
        return $this->hasMany(Enrollee::class);
    }

    public function transactions()
    {
        return $this->hasMany(TransactionInfo::class);
    }
}

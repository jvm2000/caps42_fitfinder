<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contract;
use App\Models\Enrollee;
use App\Models\Progress;
use App\Models\UserRequest;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'summary',
        'status',
        'image',
        'user_id',
        'is_prerequisite',
        'prerequisite_program_id',
        'no_of_trainees',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasTrainees()
    {
        return $this->hasMany(User::class);
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/'. $this->image);
        }
        return '/programs/default.svg';
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function prerequisite()
    {
        return $this->belongsTo(Program::class, 'prerequisite_program_id');
    }

    public function request()
    {
        return $this->hasOne(UserRequest::class);
    }

    public function enrollees()
    {
        return $this->hasMany(Enrollee::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    
    public function progress()
    {
        return $this->belongsTo(Progress::class);
    }
}

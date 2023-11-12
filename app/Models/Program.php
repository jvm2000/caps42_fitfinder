<?php

namespace App\Models;

use App\Models\User;
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
        'prerequisite_with',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function prerequisiteProgram()
    {
        return $this->belongsTo(Program::class, 'prerequisite_program_id');
    }

}

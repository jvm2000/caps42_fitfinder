<?php

namespace App\Models;

use App\Models\User;
use App\Models\Progress;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'completion',
        'stats',
        'meet_link',
        'evaluation',
        'trainee_id',
        'coach_id',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function trainee()
    {
        return $this->belongsTo(User::class, 'trainee_id');
    }
    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}

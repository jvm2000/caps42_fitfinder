<?php

namespace App\Models;

use App\Models\Program;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRequest extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'requests';

    protected $fillable = [
        'trainee_id', 
        'coach_id',
        'program_id',
        'status',
        'message',
    ];

    // Define a relationship to the User model for the requester (trainee).
    public function requester()
    {
        return $this->belongsTo(User::class, 'trainee_id');
    }

    // Define a relationship to the User model for the requested coach.
    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }
    public function programs()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}

<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRequest extends Model
{
    use HasFactory;
    protected $table = 'requests';

    protected $fillable = ['status', 'trainee_id', 'coach_id','program_id','message','status'];

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
        return $this->hasOne(Program::class, 'program_id');
    }
}

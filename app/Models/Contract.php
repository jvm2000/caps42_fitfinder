<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'coach_id',
        'trainee_id',
    ];

    public function coach() {
        return $this->belongsTo(User::class, 'coach_id');
    }

    // Define a belongsTo relationship with the User model for trainee
    public function trainee() {
        return $this->belongsTo(User::class, 'trainee_id');
    }
}

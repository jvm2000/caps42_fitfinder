<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'trainee_id',
        'coach_id',
        'reference',
        'amount',
        'status',
        'startdate',
        'enddate',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}

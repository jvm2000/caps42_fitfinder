<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'programs_id',
        'coach_id',
        'trainee_id',
        'payment_type',
        'status',
        'startdate',
        'enddate',
    ];

    public function coach() {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function trainee() {
        return $this->belongsTo(User::class, 'trainee_id');
    }
    public function program(){
        return $this->belongsTo(Program::class, 'programs_id');
    }

    public function getYourDateColumnAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }
}

<?php

namespace App\Models;

use App\Models\Enrollee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'meeting_link',
        'schedule',
        'time',
        'enrollee_id',
    ];

    public function enrollee()
    {
        return $this->belongsTo(Enrollee::class);
    }
}

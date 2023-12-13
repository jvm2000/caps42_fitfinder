<?php

namespace App\Models;

use App\Models\Module;
use App\Models\Program;
use App\Models\Enrollee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'module_id',
        'next_stage',
        'program_id',
        'enrollee_id',
        'status',
    ];

    public function program()
    {
        return $this->hasOne(Program::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function enrollee()
    {
        return $this->belongsTo(Enrollee::class);
    }
}
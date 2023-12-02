<?php

namespace App\Models;

use App\Models\Enrollee;
use App\Models\Progress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'procedure',
        'sets',
        'reps',
        'rest_period',
        'difficulty',
        'notes',
        'video_url',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function enrollee()
    {
        return $this->belongsTo(Enrollee::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function getFileURL(){
        if($this->file){
            return url('storage/'. $this->file);
        }
        return '/module/default.svg';
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getFileURL(){
        if($this->file){
            return url('storage/'. $this->file);
        }
        return '/module/default.svg';
    }


}

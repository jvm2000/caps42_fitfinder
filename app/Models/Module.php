<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',
        'duration',
        'procedure',
        'set',
        'setcount',
        'rep',
        'repcount',
        'schedule',
        'program_id',
    ];

    protected $casts = [
        'schedule' => 'array'
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

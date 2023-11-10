<?php

namespace App\Models;

use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedCert extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'status',
        'started_fitness',
        'cert_file',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

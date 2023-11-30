<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id', // Add this line
        'reference',
        'amount',
        'status',
        'startdate',
        'enddate',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id'); 
    }
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'FFreference',
        'reference',
        'payments',
        'amount',
        'status',
        'image',
        'startdate',
        'enddate',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id'); 
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/'. $this->image);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baggage extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'WeightKG', 'BaggageNumber', 'bookings_id'];
    
    public function Booking(){
        $this->belongsTo(Booking::class);
    }
}

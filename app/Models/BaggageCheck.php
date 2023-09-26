<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaggageCheck extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'CheckResult', 'bookings_id', 'pessenger_ones_id'];
    public function Booking(){
        $this->belongsTo(Booking::class);
    }
    public function Passenger(){
        $this->belongsTo(Pessenger1::class);
    }
}

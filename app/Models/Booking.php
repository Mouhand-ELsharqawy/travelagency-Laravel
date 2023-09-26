<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pessenger_twos_id', 'FlightDate', 'status', 'BookingClass', 'SeatNumber', 'BookingPaltform'];
    public function Baggage(){
        $this->hasMany(Baggage::class);
    }
    public function BaggageCheck(){
        $this->hasMany(BaggageCheck::class);
    }
    public function BoardingPass(){
        $this->hasMany(BoardingPass::class);
    }
    public function FlightManifest(){
        $this->hasMany(FlightManifest::class);
    }
    public function Passenger(){
        $this->belongsTo(Pessenger2::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightManifest extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'bookings_id', 'flights_id'];
    public function Booking(){
        $this->belongsTo(Booking::class);
    }
    
    public function Flight(){
        $this->belongsTo(Flight::class);
    }
}

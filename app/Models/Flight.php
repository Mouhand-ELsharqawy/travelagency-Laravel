<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'DepartGate', 'ArriveGate', 'air_lines_id', 'air_ports_id'];
    public function AirLine(){
        $this->belongsTo(AirLine::class);
    }
    public function AirPort(){
        $this->belongsTo(AirPort::class);
    }
    public function FlightManifest(){
        $this->hasMany(FlightManifest::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingPass extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'QRCode', 'bookings_id'];
    public function Booking(){
        $this->belongsTo(Booking::class);
    }
}

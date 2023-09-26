<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessengerTwo extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'FirstName', 'LastName', 'DOB', 'CitizenshipCountry', 'ResidenceCountry', 'PassportNumber'];
    public function Booking(){
        $this->hasMany(Booking::class);
    }
}

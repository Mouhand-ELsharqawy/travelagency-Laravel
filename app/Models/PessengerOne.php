<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessengerOne extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'FirstName', 'LastName', 'DOB'];
    public function BaggageCheck(){
        $this->hasMany(BaggageCheck::class);
    }
    public function NoFlyList(){
        $this->hasMany(NoFlyList::class);
    }
    public function Security(){
        $this->hasMany(SecurityCheck::class);
    }
}

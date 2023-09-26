<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityCheck extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pessenger_ones_id', 'CheckResult', 'comments'];
    public function Passenger(){
        $this->belongsTo(Pessenger1::class);
    }
    
}

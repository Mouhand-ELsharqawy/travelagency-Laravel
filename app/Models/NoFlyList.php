<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoFlyList extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'ActiveFrom', 'ActiveTo', 'reason', 'pessenger_ones_id'];
    public function Passenger(){
        $this->belongsTo(Pessenger1::class);
    }
}

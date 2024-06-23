<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'room_number',
        'level',
        'available'
    ];

    public function patient()
    {
        return $this->hasOne(patient::class);
    }
}

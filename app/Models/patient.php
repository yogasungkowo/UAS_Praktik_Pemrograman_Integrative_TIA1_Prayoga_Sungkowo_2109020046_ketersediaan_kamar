<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'name',
        'diagnose'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

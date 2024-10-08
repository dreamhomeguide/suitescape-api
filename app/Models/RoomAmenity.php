<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'amenity_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function amenity()
    {
        return $this->belongsTo(Amenity::class);
    }
}

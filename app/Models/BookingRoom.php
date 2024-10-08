<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'booking_id',
        'room_id',
        'name',
        'quantity',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function roomCategory()
    {
        return $this->room->roomCategory();
    }
}

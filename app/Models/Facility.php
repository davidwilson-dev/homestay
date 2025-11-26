<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Staff;
use App\Models\Room;
use App\Models\Booking;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'province',
        'phone',
        'status',
    ];

    // Relationships
    public function users()
    {
        return $this->hasMany(User::class)->whereNotNull('facility_id');
    }

    public function staff()
    {
        return $this->hasMany(Staff::class)->whereNotNull('facility_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

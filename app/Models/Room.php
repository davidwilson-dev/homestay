<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'facility_id',
        'room_number',    
        'title',
        'description',
        'capacity',
        'base_price',
        'status', 
        'floor',   
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
    ];

    // Relations
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}

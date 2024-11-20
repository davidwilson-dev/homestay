<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_customer',
        'id_passport',
        'phone_number',
        'email',
        'room_id',
        'status',
        'checkin_estimate',
        'checkout_estimate',
        'checkin',
        'description'
    ];

    public function Room(){
        return $this->belongsTo(Room::class);
    }
}

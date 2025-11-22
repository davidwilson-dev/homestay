<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'facility_id',
        'code',
        'customer_name',         
        'customer_email',      
        'customer_phone',   
        'total_amount',
        'status',
        'payment_status',
        'created_by',
        'note',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];
}

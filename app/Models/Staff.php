<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\User;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'birthday',
        'id_card',
        'phone_number',
        'position_id',
        'address',
        'additional_information'
    ];

    public function Position(){
        return $this->belongsTo(Position::class);
    }

    public function User(){
        return $this->hasOne(User::class);
    }
}

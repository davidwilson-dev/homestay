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
        'user_id',
        'position_id',
        'code',
        'full_name',
        'phone',
        'salary',
        'birthday',
        'gender',
        'recruit_date',
        'type',
        'status',
        'additional_information'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}

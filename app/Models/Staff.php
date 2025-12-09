<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\User;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'user_id',
        'facility_id',
        'full_name',
        'dateOfBirth',
        'citizen',
        'phone',
        'start_date',
        'end_date',
        'note'
    ];

    // Data type format for Date of Birth
    // protected function dateOfBirth(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn($value) =>
    //             Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d'),
    //     );
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
}

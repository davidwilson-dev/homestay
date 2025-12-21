<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;
use App\Models\Facility;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'facility_id',
        'name',
        'dateOfBirth',
        'citizen',
        'position',
        'phone',
        'address',
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

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}

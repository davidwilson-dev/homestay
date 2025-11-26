<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    //Relationships
    public function users()
    {
        //withTimestamps auto update created_at, updated_at when run attach, detach, sync
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

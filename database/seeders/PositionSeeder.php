<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'name' => 'manager',
            'display_name' => 'Quản lý',
            'slug' => 'manager',
            'description' => ''
        ]);

        Position::create([
            'name' => 'receptionist',
            'display_name' => 'Lễ tân',
            'slug' => 'receptionist',
            'description' => ''
        ]);

        Position::create([
            'name' => 'housekeeper',
            'display_name' => 'Tạp vụ',
            'slug' => 'housekeeper',
            'description' => ''
        ]);
    }
}

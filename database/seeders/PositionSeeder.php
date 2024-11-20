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
            'name' => 'Giám đốc',
        ]);

        Position::create([
            'name' => 'Quản lý',
        ]);

        Position::create([
            'name' => 'Lễ tân',
        ]);

        Position::create([
            'name' => 'Cộng tác viên',
        ]);
    }
}

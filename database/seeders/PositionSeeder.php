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
            'name' => 'giám đốc',
        ]);

        Position::create([
            'name' => 'quản lý',
        ]);

        Position::create([
            'name' => 'lễ tân',
        ]);

        Position::create([
            'name' => 'cộng tác viên',
        ]);
    }
}

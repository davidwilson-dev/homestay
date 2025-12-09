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
            'description' => ''
        ]);

        Position::create([
            'name' => 'receptionist',
            'display_name' => 'Lễ tân',
            'description' => ''
        ]);

        Position::create([
            'name' => 'accountant',
            'display_name' => 'Kế toán',
            'description' => '',
        ]);

        Position::create([
            'name' => 'housekeeper',
            'display_name' => 'Tạp vụ',
            'description' => ''
        ]);

        Position::create([
            'name' => 'security',
            'display_name' => 'Bảo vệ',
            'description' => ''
        ]);

        Position::create([
            'name' => 'chef',
            'display_name' => 'Đầu bếp',
            'description' => ''
        ]);
    }
}

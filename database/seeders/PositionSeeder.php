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
        Position::insert([
            [
                'name' => 'manager',
                'display_name' => 'Quản lý',
                'slug' => 'manager',
                'description' => 'Phụ trách điều hành chung',
                'created_at' => now(),
            ],
            [
                'name' => 'receptionist',
                'display_name' => 'Lễ tân',
                'slug' => 'receptionist',
                'description' => 'Tiếp khách, checkin/checkout',
                'created_at' => now(),
            ],
            [
                'name' => 'cleaner',
                'display_name' => 'Dọn phòng',
                'slug' => 'cleaner',
                'description' => 'Vệ sinh phòng và khuôn viên',
                'created_at' => now(),
            ],
            [
                'name' => 'collaborator',
                'display_name' => 'Cộng tác viên',
                'slug' => 'collaborator',
                'description' => 'Hỗ trợ từ xa hoặc theo giờ',
                'created_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'admin',
                'display_name' => 'Quản trị viên',
                'slug' => 'admin',
                'description' => 'Quyền quản trị toàn hệ thống',
                'created_at' => now(),
            ],
            [
                'name' => 'manager',
                'display_name' => 'Quản lý',
                'slug' => 'manager',
                'description' => 'Quản lý hoạt động homestay',
                'created_at' => now(),
            ],
            [
                'name' => 'staff',
                'display_name' => 'Nhân viên',
                'slug' => 'staff',
                'description' => 'Nhân viên làm việc tại homestay',
                'created_at' => now(),
            ],
            [
                'name' => 'collaborator',
                'display_name' => 'Cộng tác viên',
                'slug' => 'collaborator',
                'description' => 'Người hỗ trợ từ xa / bán thời gian',
                'created_at' => now(),
            ],
        ]);
    }
}

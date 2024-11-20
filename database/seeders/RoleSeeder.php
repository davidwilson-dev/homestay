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
        Role::create([
            'name' => 'Admin',
            'description' => 'Quyền hạn tối thượng'
        ]);

        Role::create([
            'name' => 'Manager',
            'description' => 'Tất cả quyền hạn trừ quản lý tài khoản'
        ]);

        Role::create([
            'name' => 'Lễ tân',
            'description' => 'Xem đơn hàng, thêm mới đơn hàng, checkin, checkout'
        ]);

        Role::create([
            'name' => 'Cộng tác viên',
            'description' => 'Xem đơn hàng'
        ]);
    }
}

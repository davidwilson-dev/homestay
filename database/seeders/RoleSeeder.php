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
            'name' => 'admin',
            'description' => 'Quyền hạn tối thượng'
        ]);

        Role::create([
            'name' => 'quản lý',
            'description' => 'Tất cả quyền hạn trừ quản lý tài khoản'
        ]);

        Role::create([
            'name' => 'lễ tân',
            'description' => 'Xem đơn hàng, thêm mới đơn hàng, checkin, checkout'
        ]);

        Role::create([
            'name' => 'cộng tác viên',
            'description' => 'Xem đơn hàng'
        ]);
    }
}

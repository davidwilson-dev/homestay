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
            'name' => 'manager facilities',
            'display_name' => 'Quản lý cơ sở homestay',
            'description' => 'Quản lý cơ sở homestay',
        ]);

        Role::create([
            'name' => 'manager users',
            'display_name' => 'Quản lý người dùng',
            'description' => 'Quản lý người dùng hệ thống',
        ]);

        Role::create([
            'name' => 'manager staffs',
            'display_name' => 'Quản lý nhân viên',
            'description' => 'Quản lý nhân viên làm việc tại homestay',
        ]);

        Role::create([
            'name' => 'manager rooms',
            'display_name' => 'Quản lý phòng',
            'description' => 'Quản lý các phòng tại homestay',
        ]);

        Role::create([
            'name' => 'create bookings',
            'display_name' => 'Tạo đặt phòng',
            'description' => 'Tạo mới các đặt phòng cho khách',
        ]);

        Role::create([
            'name' => 'check-in bookings',
            'display_name' => 'Check-in',
            'description' => 'Quản lý việc check-in',
        ]);

        Role::create([
            'name' => 'check-out bookings',
            'display_name' => 'Check-out',
            'description' => 'Quản lý việc check-out',
        ]);

        Role::create([
            'name' => 'confirm bookings',
            'display_name' => 'Xác nhận đặt phòng',
            'description' => 'Quản lý việc xác nhận đặt phòng',
        ]);

        Role::create([
            'name' => 'cancel bookings',
            'display_name' => 'Hủy đặt phòng',
            'description' => 'Quản lý việc hủy đặt phòng',
        ]);
    }
}

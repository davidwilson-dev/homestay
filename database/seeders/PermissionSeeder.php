<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'index_users',
            'display_name' => 'Xem danh sách tài khoản',
            'description' => '',
        ]);

        Permission::create([
            'name' => 'create_user',
            'display_name' => 'Tạo mới tài khoản',
            'description' => '',
        ]);

        Permission::create([
            'name' => 'update_user',
            'display_name' => 'Cập nhật tài khoản',
            'description' => '',
        ]);

        Permission::create([
            'name' => 'delete_user',
            'display_name' => 'Xóa tài khoản',
            'description' => '',
        ]);

        Permission::create([
            'name' => 'create_booking',
            'display_name' => 'Tạo mới booking',
            'description' => '',
        ]);

        Permission::create([
            'name' => 'check_in_booking',
            'display_name' => 'Check-in booking',
            'description' => '',
        ]);

        Permission::create([
            'name' => 'check_out_booking',
            'display_name' => 'Check-out booking',
            'description' => '',
        ]);
    }
}

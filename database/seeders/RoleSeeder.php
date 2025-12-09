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
            'display_name' => 'Admin IT',
            'description' => '',
        ]);

        Role::create([
            'name' => 'owner',
            'display_name' => 'Chủ sở hữu',
            'description' => '',
        ]);

        Role::create([
            'name' => 'manager',
            'display_name' => 'Quản lý',
            'description' => '',
        ]);

        Role::create([
            'name' => 'receptionist',
            'display_name' => 'Lễ tân',
            'description' => '',
        ]);

        Role::create([
            'name' => 'accountant',
            'display_name' => 'Kế toán',
            'description' => '',
        ]);

        Role::create([
            'name' => 'security',
            'display_name' => 'Bảo vệ',
            'description' => ''
        ]);

        Role::create([
            'name' => 'chef',
            'display_name' => 'Đầu bếp',
            'description' => ''
        ]);
    }
}

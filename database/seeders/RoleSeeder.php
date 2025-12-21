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
            'display_name' => 'Admin IT',
            'name' => 'admin',
            'description' => '',
        ]);

        Role::create([
            'display_name' => 'Chủ sở hữu',
            'name' => 'owner',
            'description' => '',
        ]);

        Role::create([
            'display_name' => 'Quản lý',
            'name' => 'manager',
            'description' => '',
        ]);

        Role::create([
            'display_name' => 'Nhân viên',
            'name' => 'staff',
            'description' => '',
        ]);
    }
}

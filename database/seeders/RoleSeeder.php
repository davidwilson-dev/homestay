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
            'name' => 'staff',
            'display_name' => 'Nhân viên ',
            'description' => '',
        ]);
    }
}

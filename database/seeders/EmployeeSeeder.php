<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'display_name' => 'Quản lý',
            'name' => 'manager',
            'description' => '',
        ]);

        Employee::create([
            'display_name' => 'Lễ tân',
            'name' => 'receptionist',
            'description' => '',
        ]);

        Employee::create([
            'display_name' => 'Kế toán',
            'name' => 'accountant',
            'description' => '',
        ]);

        Employee::create([
            'display_name' => 'Bảo vệ',
            'name' => 'security',
            'description' => ''
        ]);

        Employee::create([
            'display_name' => 'Phục vụ phòng',
            'name' => 'housekeeper',
            'description' => ''
        ]);

        Employee::create([
            'display_name' => 'Đầu bếp',
            'name' => 'chef',
            'description' => ''
        ]);
    }
}

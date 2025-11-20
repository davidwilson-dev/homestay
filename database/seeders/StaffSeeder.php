<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::insert([
            [
                'user_id' => 2, // Manager User
                'position' => 1, // manager
                'full_name' => 'Nguyen Huy Anh',
                'type' => 'fulltime',
                'created_at' => now(),
            ],
            [
                'user_id' => 3, // Staff User
                'position' => 2, // receptionist
                'full_name' => 'Vu Thu Thao',
                'type' => 'fulltime',
                'created_at' => now(),
            ],
            [
                'user_id' => 4, // Staff User
                'position' => 2, // receptionist
                'full_name' => 'Pham Nhu Quynh',
                'type' => 'parttime',
                'created_at' => now(),
            ],
            [
                'user_id' => 5, 
                'position' => 4,
                'full_name' => 'Vu Thi Thuy',
                'type' => 'parttime',
                'created_at' => now(),
            ],
        ]);
    }
}

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
        Staff::create([
            'user_id' => 3, 
            'facility_id' => 1,
            'position_id' => 1, 
            'id_staff' => 'HK-001',
            'full_name' => 'Tran Manh',
            'avatar' => null,
            'phone' => '0123456789',
            'email' => 'tranmanh0912@gmail.com',
            'hired_at' => null,
            'note' => ''
        ]);

        Staff::create([
            'user_id' => 5, 
            'facility_id' => 1,
            'position_id' => 2, 
            'id_staff' => 'HK-002',
            'full_name' => 'Vu Thu Thao',
            'avatar' => null,
            'phone' => '0123456789',
            'email' => 'vuthao1995@gmail.com',
            'hired_at' => null,
            'note' => ''
        ]);
    }
}

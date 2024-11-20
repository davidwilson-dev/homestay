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
            'name' => 'Nguyễn Huy Anh',
            'email' => 'nguyenhuyanh1012@gmail.com',           
            'phone_number' => '0942687068',
            'address' => 'Tràng Thi - Hoàn Kiếm - Hà Nội',
            'position_id' => '1',
        ]);
    }
}

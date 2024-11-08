<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nguyễn Huy Anh',
            'email' => 'nguyenhuyanh1012@gmail.com',
            'password' => \Hash::make('nguyenhuyanh1012@gmail.com'),
            'phone_number' => '0942687068',
            'address' => 'Tràng Thi - Hoàn Kiếm - Hà Nội',
            'role_id' => '1',
        ]);
    }
}

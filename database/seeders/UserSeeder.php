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
            'email' => 'nguyenhuyanh1012@gmail.com',
            'password' => \Hash::make('nguyenhuyanh1012@gmail.com'),
            'staff_id' => '1',
            'role_id' => '1', 
        ]);
    }
}

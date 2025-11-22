<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Staff;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'duonghp1991@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'username' => 'nguyenhuyanh_1991',
            'email' => 'nguyenhuyanh1012@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
    }
}

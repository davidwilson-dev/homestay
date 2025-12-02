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
        //IT Support
        User::create([
            'username' => 'duonghp1991',
            'email' => 'duonghp1991@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Owner
        User::create([
            'username' => 'nguyenhuyanh1012',
            'email' => 'nguyenhuyanh1012@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //
        User::factory()->count(50)->create();
    }
}

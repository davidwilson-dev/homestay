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

        //Manager
        User::create([
            'username' => 'tranmanh_0912',
            'email' => 'tranmanh0912@gmail.com',
            'password' => bcrypt('123456789'),
            'facility_id' => 1,
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Manager
        User::create([
            'username' => 'vuthuy_1993',
            'email' => 'vuthuy1993@gmail.com',
            'password' => bcrypt('123456789'),
            'facility_id' => 2,
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Receptionist
        User::create([
            'username' => 'vuthao_1995',
            'email' => 'vuthao1995@gmail.com',
            'password' => bcrypt('123456789'),
            'facility_id' => 1,
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Receptionist
        User::create([
            'username' => 'phamquynh_1994',
            'email' => 'phamquynh1994@gmail.com',
            'password' => bcrypt('123456789'),
            'facility_id' => 1,
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Receptionist
        User::create([
            'username' => 'tranthihau_1996',
            'email' => 'tranthihau1996@gmail.com',
            'password' => bcrypt('123456789'),
            'facility_id' => 2,
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Accountant
        User::create([
            'username' => 'dothuylinh_2002',
            'email' => 'dothuylinh2002@gmail.com',
            'password' => bcrypt('123456789'),
            'facility_id' => 2,
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        //Security inactive
        User::create([
            'username' => 'trinhvandoan_2000',
            'email' => 'trinhvandoan2000@gmail.com',
            'password' => bcrypt('123456789'),
            'status' => 'inactive',
            'email_verified_at' => now(),
        ]);
    }
}

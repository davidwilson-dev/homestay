<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_user')->insert([
            [
                // Admin IT: duonghp1991
                'role_id' => 1,
                'user_id' => 1,
            ],
            [
                // Owner: nguyenhuyanh1012
                'role_id' => 2,
                'user_id' => 2,
            ],
            [
                // Manager: tranmanh_0912
                'role_id' => 3,
                'user_id' => 3,
            ],
            [
                // Manager: vuthuy_1993
                'role_id' => 3,
                'user_id' => 4,
            ],
            [
                // Staff - Receptionist: vuthao_1995
                'role_id' => 4,
                'user_id' => 5,
            ],
            [
                // Staff - Receptionist: phamquynh_1994
                'role_id' => 4,
                'user_id' => 6,
            ],
            [
                // Staff - Receptionist: tranthihau_1996
                'role_id' => 4,
                'user_id' => 7,
            ],
            [
                // Staff - Accountant: dothuylinh_2002
                'role_id' => 4,
                'user_id' => 8,
            ],
            [
                // Staff - Receptionist: trinhvandoan_2000
                'role_id' => 4,
                'user_id' => 9,
            ],
        ]);
    }
}

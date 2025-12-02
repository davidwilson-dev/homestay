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
        ]);
    }
}

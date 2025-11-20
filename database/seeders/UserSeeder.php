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
        $admin = User::create([
            'name' => 'Admin Master',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $admin->roles()->sync([1]); // admin

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $manager->roles()->sync([2]); // manager

        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $staff->roles()->sync([3]); // staff

        $collab = User::create([
            'name' => 'Collaborator User',
            'email' => 'collab@example.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
        $collab->roles()->sync([4]); // collaborator
    }
}

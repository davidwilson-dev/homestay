<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Staff;
use App\Models\Role;

class UsersAndStaffsSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $owner = User::create([
            'name' => 'Duong Nguyen',
            'email' => 'duonghp1991@gmail.com',
            'password' => Hash::make('duonghp1991@gmail.com'),
            'phone' => '0789354886',
            'status' => 1,
        ]);

        Staff::create([
            'user_id' => $owner->id,
            'code' => 'NV' . str_pad($owner->id, 3, '0', STR_PAD_LEFT),
            'position_id' => 1,
            'salary' => null,
            'recruit_date' => now()->toDateString(),
        ]);

        $ownerRole = Role::where('name', 'owner')->first();
        if ($ownerRole) {
            $owner->roles()->attach($ownerRole->id);
        }

        $collab = User::create([
            'name' => 'Ctv Tran',
            'email' => 'ctv@homestay.test',
            'password' => Hash::make('password123'),
            'phone' => '0987654321',
            'status' => 1,
        ]);

        $collabRole = Role::where('name', 'collaborator')->first();
        if ($collabRole) {
            $collab->roles()->attach($collabRole->id);
        }

        $reception = User::create([
            'name' => 'Le Tan Mau',
            'email' => 'reception@homestay.test',
            'password' => Hash::make('password123'),
            'phone' => '0912345678',
            'status' => 1,
        ]);

        Staff::create([
            'user_id' => $reception->id,
            'code' => 'NV' . str_pad($reception->id, 3, '0', STR_PAD_LEFT),
            'position' => 'Receptionist',
            'salary' => 5000000,
            'recruit_date' => now()->subMonths(6)->toDateString(),
        ]);

        $recRole = Role::where('name', 'receptionist')->first();
        if ($recRole) {
            $reception->roles()->attach($recRole->id);
        }
    }
}

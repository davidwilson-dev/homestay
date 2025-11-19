<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $roles = [
            [
                'name' => 'owner',        
                'display_name' => 'Owner',        
                'description' => 'Chủ homestay',          
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name' => 'manager',      
                'display_name' => 'Manager',      
                'description' => 'Quản lý',              
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name' => 'receptionist', 
                'display_name' => 'Receptionist', 
                'description' => 'Lễ tân',               
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name' => 'housekeeper',  
                'display_name' => 'Housekeeper',  
                'description' => 'Dọn phòng',            
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name' => 'accountant',   
                'display_name' => 'Accountant',   
                'description' => 'Kế toán',              
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'name' => 'collaborator', 
                'display_name' => 'Collaborator', 
                'description' => 'Cộng tác viên (chỉ xem đơn)', 
                'created_at'=>$now,
                'updated_at'=>$now
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('code_employee_counter')->insert([
            [
                'id' => 1,
                'last_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
    }
}

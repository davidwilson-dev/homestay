<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::create([
                'name' => 'Hoàn Kiếm',
                'code' => 'HOAN_KIEM',
                'address' => 'Số 1, Phố Lê Thái Tổ, Quận Hoàn Kiếm, Hà Nội',
                'province' => 'Hà Nội',
                'phone' => '0123456789',
        ]);

        Facility::create([
                'name' => 'Lavender Tây Hồ',
                'code' => 'LAVENDER_TAY_HO',
                'address' => 'Số 2, Phố Yên Phụ, Quận Tây Hồ, Hà Nội',
                'province' => 'Hà Nội',
                'phone' => '0123456789',
        ]);

        Facility::create([
                'name' => 'Đồng Đò',
                'code' => 'DONG_DO',
                'address' => 'Hồ Đồng Đò, Xã Minh Trí, Huyện Sóc Sơn, Hà Nội',
                'province' => 'Hà Nội',
                'phone' => '0123456789',
        ]);
    }
}

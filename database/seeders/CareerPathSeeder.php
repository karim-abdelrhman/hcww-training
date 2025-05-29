<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => '#',
                'name' => 'الإدارة العليا'
            ],
            [
                'code' => '#',
                'name' => 'الوظائف الهندسية'
            ],
            [
                'code' => '#',
                'name' => 'العلوم'
            ],
            [
                'code' => '#',
                'name' => 'التمويل والمحاسبة'
            ],
            [
                'code' => '#',
                'name' => 'التنمية الإدارية'
            ],
            [
                'code' => '#',
                'name' => 'القانون'
            ],
            [
                'code' => '#',
                'name' => 'الأمن'
            ],
            [
                'code' => '#',
                'name' => 'الهندسة المساعدة'
            ],
            [
                'code' => '#',
                'name' => 'المكتبية'
            ],
            [
                'code' => '#',
                'name' => 'الخدمات المعاونة'
            ],
            [
                'code' => '#',
                'name' => 'حرفية'
            ],
            [
                'code' => '#',
                'name' => 'الإعلام'
            ],
            [
                'code' => '#',
                'name' => 'القيادية'
            ],
        ];
        DB::table('LUCAREERPATHS')->truncate();
        foreach ($data as $d) {
            DB::table('LUCAREERPATHS')->insert($d);
        }

    }
}

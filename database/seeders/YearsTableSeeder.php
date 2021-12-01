<?php

namespace Database\Seeders;

use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->delete();
        $years = [
            [
                'id'            => 1,
                'name'          => 'الفرقة الاعدادي',
                'active'        => true,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 2,
                'name'          => 'الفرقة الاولي',
                'active'        => true,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 3,
                'name'          => 'الفرقة الثانية',
                'active'        => true,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 4,
                'name'          => 'الفرقة الثالثة',
                'active'        => true,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 5,
                'name'          => 'الفرقة الرابعة',
                'active'        => true,
                'created_at'    => Carbon::now(),
            ]
        ];

        foreach ($years as $year) {
            Year::create($year);
        }
    }
}

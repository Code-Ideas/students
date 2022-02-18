<?php

namespace Database\Seeders;

use App\Models\Collage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collages')->delete();
        $collages = [
            [
                'id' => 1,
                'name' => 'كلية الهندسة',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Engineering-circle-1.png',
                'priority' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'كلية التجارة',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Commerce-circle.png',
                'priority' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'كلية العلوم',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Science-circle-150x150.png',
                'priority' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'كلية الحقوق',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Law-circle-150x150.png',
                'priority' => 4,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'كلية التربية',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Education-circle-1-150x150.png',
                'priority' => 5,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'كلية التربية النوعية',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Specific-Education-circle-150x150.png',
                'priority' => 6,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'كلية التربية الرياضية',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Physical-Education-circle-150x150.png',
                'priority' => 7,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'كلية التربية للطفولة المبكرة',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Education-circle-150x150.png',
                'priority' => 8,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'name' => 'كلية الاداب',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Arts-circle-150x150.png',
                'priority' => 9,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'name' => 'كلية الطب',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/med-logo.jpeg',
                'priority' => 10,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'name' => 'كلية الصيدلة',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-pharmacy-circle-1.png',
                'priority' => 11,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'name' => 'كلية التمريض',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Nursing-circle-150x150.png',
                'priority' => 12,
                'created_at' => Carbon::now(),
            ],
            [
                'id'   => 13,
                'name' => 'كلية تكنولوجيا الادارة ونظم المعلومات',
                'logo' => 'http://psu.edu.eg/wp-content/uploads/2022/02/Faculty-of-Management-circle-150x150.png',
                'priority' => 13,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($collages as $collage) {
            Collage::create($collage);
        }
    }
}

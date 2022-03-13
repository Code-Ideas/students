<?php

namespace Database\Seeders;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();
        $departments = [
            [
                'id'            => 1,
                'name'          => 'قسم الهندسة الكهربية',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 2,
                'name'          => 'قسم الهندسة الكيميائية',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 3,
                'name'          => 'قسم هندسة الإنتاج و التصميم الميكانيكي',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 4,
                'name'          => 'قسم هندسة القوى الميكانيكية',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 5,
                'name'          => 'قسم هندسة العمارة و التخطيط العمراني',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 6,
                'name'          => 'قسم الفيزيقا و الرياضيات الهندسية',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 7,
                'name'          => 'قسم الهندسة البحرية و عمارة السفن',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 8,
                'name'          => 'قسم الهندسة المدنية',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 9,
                'name'          => 'البرامج الجديدة',
                'active'        => true,
                'collage_id'    => 1,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 10,
                'name'          => 'قسم الصيدلانيات',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 11,
                'name'          => 'قسم العقاقير',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 12,
                'name'          => 'قسم الأدوية والسموم',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 13,
                'name'          => 'قسم الميكروبيولوجيا والمناعة',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 14,
                'name'          => 'قسم الكيمياء العضوية',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 15,
                'name'          => 'قسم الكيمياء التحليلية',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 16,
                'name'          => 'قسم الكيمياء الحيوية',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 17,
                'name'          => 'قسم الكيمياء الطبية',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 18,
                'name'          => 'قسم صيدلة صناعية',
                'active'        => true,
                'collage_id'    => 11,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 19,
                'name'          => 'قسم التمريض الأمومة و النسا والتوليد',
                'active'        => true,
                'collage_id'    => 12,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 20,
                'name'          => 'قسم تمريض الأطفال',
                'active'        => true,
                'collage_id'    => 12,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 21,
                'name'          => 'قسم تمريض الباطنى والجراحى',
                'active'        => true,
                'collage_id'    => 12,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 22,
                'name'          => 'قسم تمريض صحة المجتمع',
                'active'        => true,
                'collage_id'    => 12,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 23,
                'name'          => 'قسم التمريض النفسى والصحة العقلية',
                'active'        => true,
                'collage_id'    => 12,
                'created_at'    => Carbon::now(),
            ],
            [
                'id'            => 24,
                'name'          => 'قسم ادارة التمريض',
                'active'        => true,
                'collage_id'    => 12,
                'created_at'    => Carbon::now(),
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}

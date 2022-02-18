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
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\AdminDepartment;
use Illuminate\Database\Seeder;

class AdminDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminDepartment::create(['name' => 'شئون الطلاب', 'collage_id' => 1]);
        AdminDepartment::create(['name' => 'رعاية الطلاب', 'collage_id' => 1]);
        AdminDepartment::create(['name' => 'قسم IT', 'collage_id' => 1]);
    }
}

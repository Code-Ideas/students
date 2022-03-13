<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalDepartment;


class MedicalDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicalDepartment::create(['name' => 'باطنة']);
        MedicalDepartment::create(['name' => 'مخ وأعصاب']);
        MedicalDepartment::create(['name' => 'أنف وأذن وحنجرة']);
    }
}

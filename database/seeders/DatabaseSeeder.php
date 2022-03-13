<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CollagesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MedicalDepartmentTableSeeder::class);
        $this->call(MedicalReservationTableSeeder::class);
        $this->call(AdminDepartmentTableSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}

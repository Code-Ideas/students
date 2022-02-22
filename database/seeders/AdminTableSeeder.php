<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['name' => 'Admin', 'email' => 'admin@dashboard.com',
            'password' => bcrypt('dashboard'), 'admin_department_id' => 1]);
    }
}

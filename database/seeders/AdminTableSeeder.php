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
        Admin::create(['name' => 'Super Admin', 'email' => 'admin@dashboard.com',
            'role' => 'super_admin', 'password' => bcrypt('dashboard')]);

        Admin::create(['name' => 'Engineering Admin', 'email' => 'admin@engineering.com',
            'role' => 'admin', 'password' => bcrypt('engineering'), 'collage_id' => 1]);
    }
}

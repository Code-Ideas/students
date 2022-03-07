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
        // Super Admin
        Admin::create(['name' => 'Super Admin', 'email' => 'admin@dashboard.com',
            'role' => 'super_admin', 'password' => bcrypt('dashboard')]);
        // Admins
        Admin::create(['name' => 'Engineering Admin', 'email' => 'admin@engineering.com',
            'role' => 'admin', 'password' => bcrypt('engineering'), 'collage_id' => 1]);
        Admin::create(['name' => 'Pharmacy Admin', 'email' => 'admin@pharmacy.com',
            'role' => 'admin', 'password' => bcrypt('pharmacy'), 'collage_id' => 11]);
        Admin::create(['name' => 'Nursing Admin', 'email' => 'admin@nursing.com',
            'role' => 'admin', 'password' => bcrypt('nursing'), 'collage_id' => 12]);

        // Staff
        Admin::create(['name' => 'Engineering Member', 'email' => 'engineering@staff.com',
            'role' => 'staff', 'password' => bcrypt('engineering'), 'collage_id' => 1]);
        Admin::create(['name' => 'Pharmacy Member', 'email' => 'pharmacy@staff.com',
            'role' => 'staff', 'password' => bcrypt('pharmacy'), 'collage_id' => 11]);
        Admin::create(['name' => 'Nursing Member', 'email' => 'nursing@staff.com',
            'role' => 'staff', 'password' => bcrypt('nursing'), 'collage_id' => 12]);
    }
}

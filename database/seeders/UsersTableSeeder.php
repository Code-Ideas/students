<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Test Student',
            'email' => 'studnet@collage.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'department_id' => 6 , 'year_id' => 1, 'collage_id' => 1]);
    }
}

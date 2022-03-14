<?php

namespace Database\Seeders;

use App\Models\Collage;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create(['name' => 'الجداول الدراسية', 'type' => 'page', 'priority' => 1,
            'collages' => Collage::pluck('id')->toArray()]);
        Service::create(['name' => 'جداول الامتحانات', 'type' => 'page', 'priority' => 2,
            'collages' => Collage::pluck('id')->toArray()]);
        Service::create(['name' => 'نتائج الامتحانات', 'type' => 'link', 'priority' => 3,
            'collages' => Collage::pluck('id')->toArray(), 'link' => 'http://']);
    }
}

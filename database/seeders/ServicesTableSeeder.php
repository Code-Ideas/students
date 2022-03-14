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
            'collages' => Collage::pluck('id')->toArray(), 'icon_class' => 'fa fa-calendar']);
        Service::create(['name' => 'جداول الامتحانات', 'type' => 'page', 'priority' => 2,
            'collages' => Collage::pluck('id')->toArray(), 'icon_class' => 'fa fa-calendar-check-o']);
        Service::create(['name' => 'الامتحانات السابقة', 'type' => 'page', 'priority' => 3,
            'collages' => Collage::pluck('id')->toArray(), 'icon_class' => 'fa fa-files-o']);
        Service::create(['name' => 'نتائج الامتحانات', 'type' => 'link', 'priority' => 4,
            'collages' => Collage::pluck('id')->toArray(), 'link' => 'http://', 'icon_class' => 'fa fa-address-card']);
    }
}

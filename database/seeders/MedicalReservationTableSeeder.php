<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalReservation;
use Carbon\Carbon;


class MedicalReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicalReservation::create([
            'user_id' => 1,
            'email' => 'studnet@collage.com',
            'phone' =>'123456789',
            'message' => 'aaaaaaa',
            'medical_department_id' => 1,
            'created_at'    => Carbon::now()
         ]);
    }
}

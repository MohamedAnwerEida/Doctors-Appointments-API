<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Appointment;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //
        $faker = Faker::create();
        $Patients   = User::select(['id', 'type_id'])->where('type_id', Type::GetTypeId(Type::Patient))->get();
        $Doctors    = User::select(['id', 'type_id'])->where('type_id', Type::GetTypeId(Type::Doctor))->get();
        $ran = Appointment::GetStatusArray();
        foreach ($Patients as $key => $Patient) {
            Appointment::create([
                'Status'            => $ran[array_rand($ran, 1)],
                'Patient'           => $Patient->id,
                'Doctor'            => $Doctors->random()->id,
                'Start_date'        => Carbon::now()->addDays($key)->format('Y-m-d'),
                'End_date'          => Carbon::now()->addDays($key+1)->format('Y-m-d'),
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
        }

    }
}

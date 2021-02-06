<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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

        foreach ( Type::GetTypesArray() as $type ) {
            Type::create([ 'name' => $type  ]);
        }

        $types = Type::all();

        for ($i=0; $i < 20 ; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'type_id'       => $types->random()->id,
                'remember_token' => Str::random(10),
            ]);
        }
    }
}

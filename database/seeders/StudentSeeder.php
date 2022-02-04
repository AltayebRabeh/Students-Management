<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Year;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 2000; $i++) {
            Student::create([
                'uuid' => $faker->uuid(),
                'university_number' => $faker->biasedNumberBetween(100000, 20000000),
                'name' => $faker->firstName . ' ' . $faker->lastName . ' ' . $faker->lastName(),
                'section_id' => Section::all()->random()->id,
                'classroom_id' => 1,
                'year_id' => 1,
                'user_id' => User::all()->first()->id,
            ]);
        }
    }
}

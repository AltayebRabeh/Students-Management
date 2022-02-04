<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i < 20; $i++) {
            Teacher::create([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'description' => $faker->paragraph,
                'section_id' => Section::all()->random()->id,
                'user_id' => User::all()->first()->id,
            ]);
        }
    }
}

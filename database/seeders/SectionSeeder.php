<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            'بكلاريوس تقانة المعلومات',
            'بكلاريوس علوم حاسوب',
            'بكلاريوس إدارة اعمال',
            'بكلاريوس عمارة وتخطيط',
            'دبلوم نظم',
        ];

        $faker = Factory::create();
        for ($i=0; $i < 5; $i++) {
            Section::create([
                'name' => $sections[$i],
                'description' => $faker->paragraph,
                'count_of_classroom' => random_int(3,5),
                'user_id' => User::all()->first()->id,
            ]);
        }
    }
}

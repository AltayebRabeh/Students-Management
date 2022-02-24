<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::insert([
            ['name' => 'الاول'],
            ['name' => 'الثاني'],
            ['name' => 'الثالث'],
            ['name' => 'الرابع'],
            ['name' => 'الخامس'],
            ['name' => 'الخريجين'],
        ]);
    }
}

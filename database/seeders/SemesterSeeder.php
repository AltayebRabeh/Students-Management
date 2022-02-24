<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::insert([
            ['name' => 'الاول', 'classroom_id' => 1],
            ['name' => 'الثاني', 'classroom_id' => 1],
            ['name' => 'الثالث', 'classroom_id' => 2],
            ['name' => 'الرابع', 'classroom_id' => 2],
            ['name' => 'الخامس', 'classroom_id' => 3],
            ['name' => 'السادس', 'classroom_id' => 3],
            ['name' => 'السابع', 'classroom_id' => 4],
            ['name' => 'الثامن', 'classroom_id' => 4],
            ['name' => 'التاسع', 'classroom_id' => 5],
            ['name' => 'العاشر', 'classroom_id' => 5],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(MarkSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(StudentSeeder::class);
    }
}

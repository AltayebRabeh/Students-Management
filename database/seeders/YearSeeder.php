<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::insert([
                ['year' => '2017-2018', 'created_at' => Carbon::now(), 'user_id' => User::all()->first()->id, 'updated_at' => Carbon::now()],
                ['year' => '2018-2019', 'created_at' => Carbon::now(), 'user_id' => User::all()->first()->id, 'updated_at' => Carbon::now()],
                ['year' => '2019-2020', 'created_at' => Carbon::now(), 'user_id' => User::all()->first()->id, 'updated_at' => Carbon::now()],
                ['year' => '2020-2021', 'created_at' => Carbon::now(), 'user_id' => User::all()->first()->id, 'updated_at' => Carbon::now()]
            ]
        );
    }
}

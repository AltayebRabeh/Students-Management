<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Altayeb Rabeh',
            'username' => 'Altayeb',
            'email' => 'AltayebRabh@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
        ]);
    }
}

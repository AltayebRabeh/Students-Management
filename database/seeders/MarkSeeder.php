<?php

namespace Database\Seeders;

use App\Models\Mark;
use App\Models\User;
use App\Models\Equation;
use Illuminate\Database\Seeder;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equation::create(['name' => 'التجريبية', 'cgp' => 4.00, 'cgp_success' => 1.80, 'fails' => 0, 'user_id' => User::all()->first()->id]);

        $marks = [
            ['mark' => 'F', 'fail' => true, 'min' => '0', 'max' => '39', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'D', 'fail' => false, 'min' => '40', 'max' => '50', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'C', 'fail' => false, 'min' => '51', 'max' => '60', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'B', 'fail' => false, 'min' => '61', 'max' => '70', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'B+', 'fail' => false, 'min' => '71', 'max' => '80', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'A', 'fail' => false, 'min' => '81', 'max' => '90', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'A+', 'fail' => false, 'min' => '91', 'max' => '100', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'ABS', 'fail' => false, 'min' => '111', 'max' => '111', 'equation_id' => 1, 'calculation' => true, 'user_id' => User::all()->first()->id],
            ['mark' => 'SUP', 'fail' => false, 'min' => '222', 'max' => '222', 'equation_id' => 1, 'calculation' => false, 'user_id' => User::all()->first()->id],
        ];

        Mark::insert($marks);
    }
}

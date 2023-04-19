<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name' => "Whiskas"
            ],
            [
                'name' => "Royal Canin"
            ],
            [
                'name' => "Proplan"
            ]
            ];

        Food::insert($array);
    }
}

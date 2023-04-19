<?php

namespace Database\Seeders;

use App\Models\MasterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
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
                'name' => "Persian"
            ],
            [
                'name' => "Angora"
            ],
            [
                'name' => "Sphynx"
            ],
            [
                'name' => "Mainecoon"
            ],
            [
                'name' => "Scottish Fold"
            ]
            ];

        MasterType::insert($array);
    }
}

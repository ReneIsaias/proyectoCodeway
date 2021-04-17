<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = Period::create([
            'description' => '2023',
        ]);

        $periods = Period::create([
            'description' => '2022',
        ]);

        $periods = Period::create([
            'description' => '2021',
        ]);

        $periods = Period::create([
            'description' => '2020',
        ]);

        $periods = Period::create([
            'description' => '2019',
        ]);

        $periods = Period::create([
            'description' => '2018',
        ]);

        $periods = Period::create([
            'description' => '2017',
        ]);

        $periods = Period::create([
            'description' => '2016',
        ]);

        $periods = Period::create([
            'description' => '2015',
        ]);
    }
}

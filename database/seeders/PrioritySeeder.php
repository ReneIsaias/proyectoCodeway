<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = Priority::create([
            'description' => 'Muy alta',
        ]);

        $priorities = Priority::create([
            'description' => 'Alta',
        ]);

        $priorities = Priority::create([
            'description' => 'Media',
        ]);

        $priorities = Priority::create([
            'description' => 'Baja',
        ]);

        $priorities = Priority::create([
            'description' => 'Muy baja',
        ]);
    }
}

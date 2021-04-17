<?php

namespace Database\Seeders;

use App\Models\Type;
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
        $types = Type::create([
            'description' => 'Tarea',
        ]);

        $types = Type::create([
            'description' => 'Actividad',
        ]);

        $types = Type::create([
            'description' => 'Trabajo',
        ]);

        $types = Type::create([
            'description' => 'Investigación',
        ]);

        $types = Type::create([
            'description' => 'Documentación',
        ]);

        $types = Type::create([
            'description' => 'Pendiente',
        ]);
    }
}

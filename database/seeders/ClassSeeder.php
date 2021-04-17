<?php

namespace Database\Seeders;

use App\Models\Clas;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = Clas::create([
            'description' => 'Desarrollo software',
        ]);

        $class = Clas::create([
            'description' => 'Desarrollo web',
        ]);

        $class = Clas::create([
            'description' => 'Desarrollo móvil',
        ]);

        $class = Clas::create([
            'description' => 'Aplicaciones nativas',
        ]);

        $class = Clas::create([
            'description' => 'Aplicaciónes Hibridas',
        ]);
    }
}

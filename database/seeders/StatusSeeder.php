<?php

namespace Database\Seeders;

use App\Models\Statu;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = Statu::create([
            'description' => 'Creado',
        ]);

        $status = Statu::create([
            'description' => 'Desarrollo',
        ]);

        $status = Statu::create([
            'description' => 'Finalizado',
        ]);

        $status = Statu::create([
            'description' => 'Pendiente',
        ]);
    }
}

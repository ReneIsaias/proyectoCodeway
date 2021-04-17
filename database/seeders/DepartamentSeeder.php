<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departaments = Departament::create([
            'name'          => 'Desarrollo',
            'description'   => 'Departamento encargada en el area de desarrollo',
            'responsable'   => 'Administrador',
        ]);

        $departaments = Departament::create([
            'name'          => 'Sistemas',
            'description'   => 'Departamento encargada en el area de sistemas',
            'responsable'   => 'Administrador',
        ]);

        $departaments = Departament::create([
            'name'          => 'Negocios',
            'description'   => 'Departamento encargada en el area de negocios para la empresa',
            'responsable'   => 'Administrador',
        ]);

        $departaments = Departament::create([
            'name'          => 'Recursos humanos',
            'description'   => 'Departamento encargada en el area de recursos humanos',
            'responsable'   => 'Administrador',
        ]);

        $departaments = Departament::create([
            'name'          => 'Marqueting',
            'description'   => 'Departamento encargada en el area de marqueting',
            'responsable'   => 'Administrador',
        ]);

        $departaments = Departament::create([
            'name'          => 'Administración',
            'description'   => 'Departamento encargada en la administración de la empresa',
            'responsable'   => 'Administrador',
        ]);

        $departaments = Departament::create([
            'name'          => 'Redes',
            'description'   => 'Departamento encargada en el area de redes',
            'responsable'   => 'Administrador',
        ]);
    }
}

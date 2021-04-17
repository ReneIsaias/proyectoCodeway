<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;


class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = Group::create([
            'name'          => 'Backend',
            'description'   => 'Área donde solo se ven cosas relacionadas con el Backend',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Frontend',
            'description'   => 'Área donde solo se ven cosas relacionadas con el Frontend',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Marketing',
            'description'   => 'Área donde solo se ven cosas relacionadas con el Marketing',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Q&A',
            'description'   => 'Área donde solo se ven cosas relacionadas con el Q&A',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Testing',
            'description'   => 'Área donde solo se ven cosas relacionadas con el Testing',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Administración',
            'description'   => 'Área donde solo se ven cosas relacionadas con la Administración',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Sistemas',
            'description'   => 'Área donde solo se ven cosas relacionadas con Sistemas',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Recursos Humanos',
            'description'   => 'Área donde solo se ven cosas relacionadas con las Recursos Humanos',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Desarrollo web',
            'description'   => 'Área donde solo se ven cosas relacionadas en Desarrollo web',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Desarrollo móvil',
            'description'   => 'Área donde solo se ven cosas relacionadas con los Desarrollo móvil',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Diseño web',
            'description'   => 'Área donde solo se ven cosas relacionadas con los Diseño web',
            'responsable'   => 'Administrador',
        ]);

        $groups = Group::create([
            'name'          => 'Diseño móvil',
            'description'   => 'Área donde solo se ven cosas relacionadas con la Diseño móvil',
            'responsable'   => 'Administrador',
        ]);
    }
}

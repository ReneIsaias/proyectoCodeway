<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /*
            Mando llamar a los seeder que he creado

            Estos se encargaran de llenar con algunos datos la base de datos
        */

        /* $this->call(AbsenceSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(ClassSeeder::class);

        $this->call(DepartamentSeeder::class);

        $this->call(GroupSeeder::class);

        $this->call(PrioritySeeder::class);

        $this->call(StatusSeeder::class);

        $this->call(TypeSeeder::class); */

        $this->call(PeriodSeeder::class);

        $this->call(PermissionListSeeder::class);

        $this->call(RolSeeder::class);

        /* Position::factory(10)->create(); */

        /*
            Mando llamar a los faker que he creado

            Estos se encargaran de poblar mi base de datos
        */

        /*

        Estas tres fabricas ejecutarlas solo si se quiren usuarios de prueba, no es recomendable

        User::factory(49)->create();

        Profile::factory(10)->create();

        Comment::factory(150)->create();

        */


        /*

        Estas favricas estan relacionadas con tablas fuertes por lo que pueden tener errores si se modifica las siembras.
        Position::factory(10)->create();

        Holiday::factory(50)->create();

        Task::factory(100)->create();

        Project::factory(50)->create();

        Event::factory(50)->create();

        Preuser::factory(50)->create();

        Vacant::factory(10)->create();

        // esta fabrica ya tiene una siembra, asi que solo ejecutar una
        Priority::factory(200)->create();

        */
    }
}

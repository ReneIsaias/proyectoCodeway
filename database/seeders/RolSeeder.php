<?php

namespace Database\Seeders;

use App\Models\Departament;
use App\Models\Group;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Truncamos las tablas */
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Role::truncate();
        Departament::truncate();
        DB::statement("SET foreign_key_checks=1");

        /* Creamos el usuario administrador */
        $useradmin = User::where('email', 'admin@admin.com')->first();
        if ($useradmin) {
            $useradmin->delete();
        }
        $useradmin = User::create([
            'nameUser'          => 'Administrador',
            'firstLastname'     => '',
            'secondLastname'    => '',
            'phone'             => '',
            'name'              => 'Administrador',
            'email'             => 'admin@codewaymx.com',
            'corporative'       => 'admin@admin.com',
            'password'          => Hash::make('maquiabelico'),
        ]);

        /* Creamos el rol administrador */
        $roladmin = Role::create([
            'name'          => 'Administrador',
            'slug'          => 'administrador',
            'description'   => 'Es el rol que solo desempeña el usuario administrador',
            'fullAccess'    => 'yes',
            'responsable'   => 'Administrador',
            'range'         => '1',
            'asignament'    => '0',
        ]);

        /* Creamos un rol que se asigne a los usuarios por defecto */
        $roluser = Role::create([
            'name'          => 'Personal',
            'slug'          => 'personal',
            'description'   => 'Rol que se le asigna a un usuario, tiene los permisos basicos',
            'fullAccess'    => 'no',
            'responsable'   => 'Administrador',
            'range'         => '2',
            'asignament'    => '0',
        ]);

        $departamentadmin = Departament::create([
            'name'          => 'Administrador',
            'description'   => 'Departamento que es para el usuario administrador del sistema',
            'responsable'   => 'Administrador',
        ]);

        $areaadmin  = Group::create([
            'name'          => 'Administrador',
            'description'   => 'Área que es para el usuario administrador del sistema',
            'responsable'   => 'Administrador',
        ]);


        /* Sincronizamos el usuario administrador  con su perfil  */
        $profile = Profile::create([
            'description'  => '',
            'birthday'     => null,
            'facebook'     => '',
            'instagram'    => '',
            'github'       => '',
            'website'      => '',
            'other'        => '',
            'user_id'      => $useradmin->id,
        ]);

        /* Sincronizamos el usuario administrador con el rol administrador */
        $useradmin->roles()->sync([$roladmin->id]);

        /* Sincronizamos el usuario administrador con el departamento de administrador */
        $useradmin->departaments()->sync([$departamentadmin->id]);

        /* Sincronizamos el usuario administrador con el área de administrador */
        $useradmin->groups()->sync([$areaadmin->id]);
    }
}

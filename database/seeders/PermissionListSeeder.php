<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Variable que almacenara a los permisos que se manejaran en el sistema */
        $permission_all = [];

        /*
    Ausencia permiso del modelo Absence
    Listar todos los absences
    */
        $permission = Permission::create([
            'name'          => 'Listar las ausencias',
            'slug'          => 'absence.index',
            'description'   => 'Un usuario puede listar las ausencias',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un ausencia */
        $permission = Permission::create([
            'name'          => 'Mostrar una ausencia',
            'slug'          => 'absence.show',
            'description'   => 'Un usuario puede ver una ausencia',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo ausencia */
        $permission = Permission::create([
            'name'          => 'Agregar una ausencia',
            'slug'          => 'absence.create',
            'description'   => 'Un usuario puede agregar una ausencia',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un ausencia */
        $permission = Permission::create([
            'name'          => 'Editar una ausencia',
            'slug'          => 'absence.edit',
            'description'   => 'Un usuario puede editar una ausencia',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un ausencia */
        $permission = Permission::create([
            'name'          => 'Eliminar una ausencia',
            'slug'          => 'absence.destroy',
            'description'   => 'Un usuario puede eliminar una ausencia',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Grupo permiso del modelo Groups
    Listar todos las áreas o grupos
    */
        $permission = Permission::create([
            'name'          => 'Listar las áreas',
            'slug'          => 'area.index',
            'description'   => 'Un usuario puede listar las áreas',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un grupo */
        $permission = Permission::create([
            'name'          => 'Mostrar una área',
            'slug'          => 'area.show',
            'description'   => 'Un usuario puede ver una área',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo grupo */
        $permission = Permission::create([
            'name'          => 'Agregar una área',
            'slug'          => 'area.create',
            'description'   => 'Un usuario puede agregar una área',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un grupo */
        $permission = Permission::create([
            'name'          => 'Editar una área',
            'slug'          => 'area.edit',
            'description'   => 'Un usuario puede editar una área',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un grupo */
        $permission = Permission::create([
            'name'          => 'Eliminar una área',
            'slug'          => 'area.destroy',
            'description'   => 'Un usuario puede eliminar una área',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Aspirantes permiso del modelo Preuser
    Listar todos los preusers o Aspirantes
    */
        $permission = Permission::create([
            'name'          => 'Listar los aspirantes',
            'slug'          => 'preuser.index',
            'description'   => 'Un usuario puede listar los aspirantes',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Aspirantes */
        $permission = Permission::create([
            'name'          => 'Mostrar un aspirante',
            'slug'          => 'preuser.show',
            'description'   => 'Un usuario puede ver un aspirante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Aspirantes */
        $permission = Permission::create([
            'name'          => 'Agregar un aspirante',
            'slug'          => 'preuser.create',
            'description'   => 'Un usuario puede agregar un aspirante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Aspirantes */
        $permission = Permission::create([
            'name'          => 'Editar un aspirante',
            'slug'          => 'preuser.edit',
            'description'   => 'Un usuario puede editar un aspirante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Aspirantes */
        $permission = Permission::create([
            'name'          => 'Eliminar un aspirante',
            'slug'          => 'preuser.destroy',
            'description'   => 'Un usuario puede eliminar un aspirante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Categoria permiso del modelo Category
    Listar todos los categorys
    */
        $permission = Permission::create([
            'name'          => 'Listar las categorías',
            'slug'          => 'category.index',
            'description'   => 'Un usuario puede listar las categorías',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un categoria */
        $permission = Permission::create([
            'name'          => 'Mostrar una categoría',
            'slug'          => 'category.show',
            'description'   => 'Un usuario puede ver una categoría',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo categoria */
        $permission = Permission::create([
            'name'          => 'Agregar una categoría',
            'slug'          => 'category.create',
            'description'   => 'Un usuario puede agregar una categoría',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un categoria */
        $permission = Permission::create([
            'name'          => 'Editar una categoría',
            'slug'          => 'category.edit',
            'description'   => 'Un usuario puede editar una categoría',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un categoria */
        $permission = Permission::create([
            'name'          => 'Eliminar una categoría',
            'slug'          => 'category.destroy',
            'description'   => 'Un usuario puede eliminar una categoría',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Clase permiso del modelo Class
    Listar todos los classs
    */
        $permission = Permission::create([
            'name'          => 'Listar las clases',
            'slug'          => 'class.index',
            'description'   => 'Un usuario puede listar las clases',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un clase */
        $permission = Permission::create([
            'name'          => 'Mostrar una clase',
            'slug'          => 'class.show',
            'description'   => 'Un usuario puede ver una clase',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo clase */
        $permission = Permission::create([
            'name'          => 'Agregar una clase',
            'slug'          => 'class.create',
            'description'   => 'Un usuario puede agregar una clase',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un clase */
        $permission = Permission::create([
            'name'          => 'Editar una clase',
            'slug'          => 'class.edit',
            'description'   => 'Un usuario puede editar una clase',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un clase */
        $permission = Permission::create([
            'name'          => 'Eliminar una clase',
            'slug'          => 'class.destroy',
            'description'   => 'Un usuario puede eliminar una clase',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Departamento permiso del modelo Departament
    Listar todos los departaments
    */
        $permission = Permission::create([
            'name'          => 'Listar los departamentos',
            'slug'          => 'departament.index',
            'description'   => 'Un usuario puede listar los departamentos',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un departamento */
        $permission = Permission::create([
            'name'          => 'Mostrar un departamento',
            'slug'          => 'departament.show',
            'description'   => 'Un usuario puede ver un departamento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo departamento */
        $permission = Permission::create([
            'name'          => 'Agregar un departamento',
            'slug'          => 'departament.create',
            'description'   => 'Un usuario puede agregar un departamento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un departamento */
        $permission = Permission::create([
            'name'          => 'Editar un departamento',
            'slug'          => 'departament.edit',
            'description'   => 'Un usuario puede editar un departamento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un departamento */
        $permission = Permission::create([
            'name'          => 'Eliminar un departamento',
            'slug'          => 'departament.destroy',
            'description'   => 'Un usuario puede eliminar un departamento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Evento permiso del modelo Event
    Listar todos los events
    */
        $permission = Permission::create([
            'name'          => 'Listar los eventos',
            'slug'          => 'event.index',
            'description'   => 'Un usuario puede listar los eventos',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un evento */
        $permission = Permission::create([
            'name'          => 'Mostrar un evento',
            'slug'          => 'event.show',
            'description'   => 'Un usuario puede ver un evento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo evento */
        $permission = Permission::create([
            'name'          => 'Agregar un evento',
            'slug'          => 'event.create',
            'description'   => 'Un usuario puede agregar un evento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un evento */
        $permission = Permission::create([
            'name'          => 'Editar un evento',
            'slug'          => 'event.edit',
            'description'   => 'Un usuario puede editar un evento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un evento */
        $permission = Permission::create([
            'name'          => 'Eliminar un evento',
            'slug'          => 'event.destroy',
            'description'   => 'Un usuario puede eliminar un evento',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Vacaciones permiso del modelo Holiday
    Listar todos los holidays
    */
        $permission = Permission::create([
            'name'          => 'Listar las vacaciones',
            'slug'          => 'holiday.index',
            'description'   => 'Un usuario puede listar las vacaciones',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un vacaciones */
        $permission = Permission::create([
            'name'          => 'Mostrar una vacación',
            'slug'          => 'holiday.show',
            'description'   => 'Un usuario puede ver una vacación',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo vacaciones */
        $permission = Permission::create([
            'name'          => 'Agregar una vacación',
            'slug'          => 'holiday.create',
            'description'   => 'Un usuario puede agregar una vacación',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un vacaciones */
        $permission = Permission::create([
            'name'          => 'Editar una vacación',
            'slug'          => 'holiday.edit',
            'description'   => 'Un usuario puede editar una vacación',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un vacaciones */
        $permission = Permission::create([
            'name'          => 'Eliminar una vacación',
            'slug'          => 'holiday.destroy',
            'description'   => 'Un usuario puede eliminar una vacación',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Periodo permiso del modelo Period
    Listar todos los periods
    */
        $permission = Permission::create([
            'name'          => 'Listar los periodos',
            'slug'          => 'period.index',
            'description'   => 'Un usuario puede listar los periodos',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un periodo */
        $permission = Permission::create([
            'name'          => 'Mostrar un periodo',
            'slug'          => 'period.show',
            'description'   => 'Un usuario puede ver un periodo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo periodo */
        $permission = Permission::create([
            'name'          => 'Agregar un periodo',
            'slug'          => 'period.create',
            'description'   => 'Un usuario puede agregar un periodo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un periodo */
        $permission = Permission::create([
            'name'          => 'Editar un periodo',
            'slug'          => 'period.edit',
            'description'   => 'Un usuario puede editar un periodo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un periodo */
        $permission = Permission::create([
            'name'          => 'Eliminar un periodo',
            'slug'          => 'period.destroy',
            'description'   => 'Un usuario puede eliminar un periodo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Permiso permiso del modelo Permission
    Listar todos los permissions
    */
        $permission = Permission::create([
            'name'          => 'Listar los permisos',
            'slug'          => 'permission.index',
            'description'   => 'Un usuario puede listar los permisos',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un permiso */
        $permission = Permission::create([
            'name'          => 'Mostrar un permiso',
            'slug'          => 'permission.show',
            'description'   => 'Un usuario puede ver un permiso',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un permiso */
        $permission = Permission::create([
            'name'          => 'Editar un permiso',
            'slug'          => 'permission.edit',
            'description'   => 'Un usuario puede editar un permiso',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Prioridad permiso del modelo Priority
    Listar todos los prioritys
    */
        $permission = Permission::create([
            'name'          => 'Listar las prioridades',
            'slug'          => 'priority.index',
            'description'   => 'Un usuario puede listar las prioridades',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Prioridad */
        $permission = Permission::create([
            'name'          => 'Mostrar una prioridad',
            'slug'          => 'priority.show',
            'description'   => 'Un usuario puede ver una prioridad',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Prioridad */
        $permission = Permission::create([
            'name'          => 'Agregar una prioridad',
            'slug'          => 'priority.create',
            'description'   => 'Un usuario puede agregar una prioridad',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Prioridad */
        $permission = Permission::create([
            'name'          => 'Editar una prioridad',
            'slug'          => 'priority.edit',
            'description'   => 'Un usuario puede editar una prioridad',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Prioridad */
        $permission = Permission::create([
            'name'          => 'Eliminar una prioridad',
            'slug'          => 'priority.destroy',
            'description'   => 'Un usuario puede eliminar una prioridad',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Perfil permiso del modelo Profile
    Listar todos los profiles
    */
        /* Permite activar/desactivar un Perfil */
        $permission = Permission::create([
            'name'          => 'Editar su cuenta',
            'slug'          => 'profile.update',
            'description'   => 'Un usuario puede activar/desactivar su cuenta',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Proyecto permiso del modelo Project
    Listar todos los projects
    */
        $permission = Permission::create([
            'name'          => 'Listar los proyectos',
            'slug'          => 'project.index',
            'description'   => 'Un usuario puede listar los proyectos',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Proyecto */
        $permission = Permission::create([
            'name'          => 'Mostrar un proyecto',
            'slug'          => 'project.show',
            'description'   => 'Un usuario puede ver un proyecto',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Proyecto */
        $permission = Permission::create([
            'name'          => 'Agregar un proyecto',
            'slug'          => 'project.create',
            'description'   => 'Un usuario puede agregar un proyecto',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Proyecto */
        $permission = Permission::create([
            'name'          => 'Editar un proyecto',
            'slug'          => 'project.edit',
            'description'   => 'Un usuario puede editar un proyecto',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Proyecto */
        $permission = Permission::create([
            'name'          => 'Eliminar un proyecto',
            'slug'          => 'project.destroy',
            'description'   => 'Un usuario puede eliminar un proyecto',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Rol permiso del modelo Role
    Listar todos los roles
    */
        $permission = Permission::create([
            'name'          => 'Listar los roles',
            'slug'          => 'role.index',
            'description'   => 'Un usuario puede listar los roles',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Rol */
        $permission = Permission::create([
            'name'          => 'Mostrar un rol',
            'slug'          => 'role.show',
            'description'   => 'Un usuario puede ver un rol',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Rol */
        $permission = Permission::create([
            'name'          => 'Agregar un rol',
            'slug'          => 'role.create',
            'description'   => 'Un usuario puede agregar un rol',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Rol */
        $permission = Permission::create([
            'name'          => 'Editar un rol',
            'slug'          => 'role.edit',
            'description'   => 'Un usuario puede editar un rol',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Rol */
        $permission = Permission::create([
            'name'          => 'Eliminar un rol',
            'slug'          => 'role.destroy',
            'description'   => 'Un usuario puede eliminar un rol',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Estado permiso del modelo Status
    Listar todos los statuss
    */
        $permission = Permission::create([
            'name'          => 'Listar los estados',
            'slug'          => 'status.index',
            'description'   => 'Un usuario puede listar los estados',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Estado */
        $permission = Permission::create([
            'name'          => 'Mostrar un estado',
            'slug'          => 'status.show',
            'description'   => 'Un usuario puede ver un estado',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Estado */
        $permission = Permission::create([
            'name'          => 'Agregar un estado',
            'slug'          => 'status.create',
            'description'   => 'Un usuario puede agregar un estado',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Estado */
        $permission = Permission::create([
            'name'          => 'Editar un estado',
            'slug'          => 'status.edit',
            'description'   => 'Un usuario puede editar un estado',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Estado */
        $permission = Permission::create([
            'name'          => 'Eliminar un estado',
            'slug'          => 'status.destroy',
            'description'   => 'Un usuario puede eliminar un estado',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Tarea permiso del modelo Task
    Listar todos los tasks
    */
        $permission = Permission::create([
            'name'          => 'Listar las tareas',
            'slug'          => 'task.index',
            'description'   => 'Un usuario puede listar las tareas',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Tarea */
        $permission = Permission::create([
            'name'          => 'Mostrar una tarea',
            'slug'          => 'task.show',
            'description'   => 'Un usuario puede ver una tarea',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Tarea */
        /* $permission = Permission::create([
            'name'          => 'Agregar una tarea',
            'slug'          => 'task.create',
            'description'   => 'Un usuario puede agregar una tarea',
        ]); */
        /* Agregamos a la variable permission el id del permiso creado */
        /* $permission_all[] = $permission->id; */
        /* Permite editar un Tarea */
        $permission = Permission::create([
            'name'          => 'Editar una tarea',
            'slug'          => 'task.edit',
            'description'   => 'Un usuario puede editar una tarea',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Tarea */
        $permission = Permission::create([
            'name'          => 'Eliminar una tarea',
            'slug'          => 'task.destroy',
            'description'   => 'Un usuario puede eliminar una tarea',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Tipo permiso del modelo Type
    Listar todos los types
    */
        $permission = Permission::create([
            'name'          => 'Listar los tipos',
            'slug'          => 'type.index',
            'description'   => 'Un usuario puede listar los tipos',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Tipo */
        $permission = Permission::create([
            'name'          => 'Mostrar un tipo',
            'slug'          => 'type.show',
            'description'   => 'Un usuario puede ver un tipo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Tipo */
        $permission = Permission::create([
            'name'          => 'Agregar un tipo',
            'slug'          => 'type.create',
            'description'   => 'Un usuario puede agregar un tipo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Tipo */
        $permission = Permission::create([
            'name'          => 'Editar un tipo',
            'slug'          => 'type.edit',
            'description'   => 'Un usuario puede editar un tipo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Tipo */
        $permission = Permission::create([
            'name'          => 'Eliminar un tipo',
            'slug'          => 'type.destroy',
            'description'   => 'Un usuario puede eliminar un tipo',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Usuario permiso del modelo User
    Listar todos los users
    */
        $permission = Permission::create([
            'name'          => 'Listar los usuarios',
            'slug'          => 'user.index',
            'description'   => 'Un usuario puede listar los usuarios',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Usuario */
        $permission = Permission::create([
            'name'          => 'Mostrar a otro usuario',
            'slug'          => 'user.show',
            'description'   => 'Un usuario puede ver a otro usuario',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Usuario */
        $permission = Permission::create([
            'name'          => 'Agregar a otro usuario',
            'slug'          => 'user.create',
            'description'   => 'Un usuario puede agregar a otro usuario',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Usuario */
        $permission = Permission::create([
            'name'          => 'Editar a otro usuario',
            'slug'          => 'user.edit',
            'description'   => 'Un usuario puede editar a otro usuario',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Usuario */
        $permission = Permission::create([
            'name'          => 'Eliminar a otro usuario',
            'slug'          => 'user.destroy',
            'description'   => 'Un usuario puede eliminar a otro usuario',
        ]);

        //Permisos solo para el usuario registrado
        $permission = Permission::create([
            'name'          => 'Mostrar solo su usuario',
            'slug'          => 'userown.show',
            'description'   => 'Un usuario puede ver solo su usuario',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name'          => 'Editar solo su usuario',
            'slug'          => 'userown.edit',
            'description'   => 'Un usuario puede editar solo su usuario',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;

        /*
    Vacante permiso del modelo Vacant
    Listar todos los vacants
    */
        $permission = Permission::create([
            'name'          => 'Listar las vacantes',
            'slug'          => 'vacant.index',
            'description'   => 'Un usuario puede listar las vacantes',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Ver en detalle a un Vacante */
        $permission = Permission::create([
            'name'          => 'Mostrar una vacante',
            'slug'          => 'vacant.show',
            'description'   => 'Un usuario puede ver una vacante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite crear un nuevo Vacante */
        $permission = Permission::create([
            'name'          => 'Agregar una vacante',
            'slug'          => 'vacant.create',
            'description'   => 'Un usuario puede agregar una vacante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite editar un Vacante */
        $permission = Permission::create([
            'name'          => 'Editar una vacante',
            'slug'          => 'vacant.edit',
            'description'   => 'Un usuario puede editar una vacante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
        /* Permite eliminar un Vacante */
        $permission = Permission::create([
            'name'          => 'Eliminar una vacante',
            'slug'          => 'vacant.destroy',
            'description'   => 'Un usuario puede eliminar una vacante',
        ]);
        /* Agregamos a la variable permission el id del permiso creado */
        $permission_all[] = $permission->id;
    }
}

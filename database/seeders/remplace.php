
<?php

use App\Models\Permission;


/*
Vacante permiso del modelo Vacant
Listar todos los vacants
*/
$permission = Permission::create([
    'name'          => 'List vacant',
    'slug'          => 'vacant.index',
    'description'   => 'A vacant can list vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Vacante */
$permission = Permission::create([
    'name'          => 'Show vacant',
    'slug'          => 'vacant.show',
    'description'   => 'A vacant can see vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Vacante */
$permission = Permission::create([
    'name'          => 'Create vacant',
    'slug'          => 'vacant.create',
    'description'   => 'A vacant can create vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Vacante */
$permission = Permission::create([
    'name'          => 'Edit vacant',
    'slug'          => 'vacant.edit',
    'description'   => 'A vacant can edit vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Vacante */
$permission = Permission::create([
    'name'          => 'Destroy vacant',
    'slug'          => 'vacant.destroy',
    'description'   => 'A vacant can destroy vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;


////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////

/*
    Rol permiso del modelo Role
    Listar todos los roles
    */
$permission = Permission::create([
    'name'          => 'List role',
    'slug'          => 'role.index',
    'description'   => 'A user can list role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un rol */
$permission = Permission::create([
    'name'          => 'Show role',
    'slug'          => 'role.show',
    'description'   => 'A user can see role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo rol */
$permission = Permission::create([
    'name'          => 'Create role',
    'slug'          => 'role.create',
    'description'   => 'A user can create role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un rol */
$permission = Permission::create([
    'name'          => 'Edit role',
    'slug'          => 'role.edit',
    'description'   => 'A user can edit role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un rol */
$permission = Permission::create([
    'name'          => 'Destroy role',
    'slug'          => 'role.destroy',
    'description'   => 'A user can destroy role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Permission permiso del modelo Permission
    Listar todos los permisos
    */
$permission = Permission::create([
    'name'          => 'List permission',
    'slug'          => 'permission.index',
    'description'   => 'A user can list permission',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un permiso */
$permission = Permission::create([
    'name'          => 'Show permission',
    'slug'          => 'permission.show',
    'description'   => 'A user can see permission',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo permiso */
$permission = Permission::create([
    'name'          => 'Create permission',
    'slug'          => 'permission.create',
    'description'   => 'A user can create permission',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un permiso */
$permission = Permission::create([
    'name'          => 'Edit permission',
    'slug'          => 'permission.edit',
    'description'   => 'A user can edit permission',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un permiso */
$permission = Permission::create([
    'name'          => 'Destroy permission',
    'slug'          => 'permission.destroy',
    'description'   => 'A user can destroy permission',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Grupo permiso del modelo Group
    Listar todos los groups
    */
$permission = Permission::create([
    'name'          => 'List group',
    'slug'          => 'group.index',
    'description'   => 'A user can list group',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un grupo */
$permission = Permission::create([
    'name'          => 'Show group',
    'slug'          => 'group.show',
    'description'   => 'A user can see group',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo grupo */
$permission = Permission::create([
    'name'          => 'Create group',
    'slug'          => 'group.create',
    'description'   => 'A user can create group',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un grupo */
$permission = Permission::create([
    'name'          => 'Edit group',
    'slug'          => 'group.edit',
    'description'   => 'A user can edit group',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un grupo */
$permission = Permission::create([
    'name'          => 'Destroy group',
    'slug'          => 'group.destroy',
    'description'   => 'A user can destroy group',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Periodo permiso del modelo Period
    Listar todos los periods
    */
$permission = Permission::create([
    'name'          => 'List period',
    'slug'          => 'period.index',
    'description'   => 'A user can list period',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un periodo */
$permission = Permission::create([
    'name'          => 'Show period',
    'slug'          => 'period.show',
    'description'   => 'A user can see period',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo periodo */
$permission = Permission::create([
    'name'          => 'Create period',
    'slug'          => 'period.create',
    'description'   => 'A user can create period',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un periodo */
$permission = Permission::create([
    'name'          => 'Edit period',
    'slug'          => 'period.edit',
    'description'   => 'A user can edit period',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un periodo */
$permission = Permission::create([
    'name'          => 'Destroy period',
    'slug'          => 'period.destroy',
    'description'   => 'A user can destroy period',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Ausencia permiso del modelo Absence
    Listar todos los absences
    */
$permission = Permission::create([
    'name'          => 'List absence',
    'slug'          => 'absence.index',
    'description'   => 'A user can list absence',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un ausencia */
$permission = Permission::create([
    'name'          => 'Show absence',
    'slug'          => 'absence.show',
    'description'   => 'A user can see absence',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo ausencia */
$permission = Permission::create([
    'name'          => 'Create absence',
    'slug'          => 'absence.create',
    'description'   => 'A user can create absence',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un ausencia */
$permission = Permission::create([
    'name'          => 'Edit absence',
    'slug'          => 'absence.edit',
    'description'   => 'A user can edit absence',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un ausencia */
$permission = Permission::create([
    'name'          => 'Destroy absence',
    'slug'          => 'absence.destroy',
    'description'   => 'A user can destroy absence',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Vacante permiso del modelo Vacant
    Listar todos los vacants
    */
$permission = Permission::create([
    'name'          => 'List vacant',
    'slug'          => 'vacant.index',
    'description'   => 'A user can list vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un vacante */
$permission = Permission::create([
    'name'          => 'Show vacant',
    'slug'          => 'vacant.show',
    'description'   => 'A user can see vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo vacante */
$permission = Permission::create([
    'name'          => 'Create vacant',
    'slug'          => 'vacant.create',
    'description'   => 'A user can create vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un vacante */
$permission = Permission::create([
    'name'          => 'Edit vacant',
    'slug'          => 'vacant.edit',
    'description'   => 'A user can edit vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un vacante */
$permission = Permission::create([
    'name'          => 'Destroy vacant',
    'slug'          => 'vacant.destroy',
    'description'   => 'A user can destroy vacant',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Preusuario permiso del modelo Preuser
    Listar todos los preusers
    */
$permission = Permission::create([
    'name'          => 'List preuser',
    'slug'          => 'preuser.index',
    'description'   => 'A user can list preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un preusuario */
$permission = Permission::create([
    'name'          => 'Show preuser',
    'slug'          => 'preuser.show',
    'description'   => 'A user can see preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo preusuario */
$permission = Permission::create([
    'name'          => 'Create preuser',
    'slug'          => 'preuser.create',
    'description'   => 'A user can create preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un preusuario */
$permission = Permission::create([
    'name'          => 'Edit preuser',
    'slug'          => 'preuser.edit',
    'description'   => 'A user can edit preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un preusuario */
$permission = Permission::create([
    'name'          => 'Destroy preuser',
    'slug'          => 'preuser.destroy',
    'description'   => 'A user can destroy preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Prioridades permiso del modelo Priority
    Listar todos los prioritys
    */
$permission = Permission::create([
    'name'          => 'List priority',
    'slug'          => 'priority.index',
    'description'   => 'A user can list priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un prioridades */
$permission = Permission::create([
    'name'          => 'Show priority',
    'slug'          => 'priority.show',
    'description'   => 'A user can see priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo prioridades */
$permission = Permission::create([
    'name'          => 'Create priority',
    'slug'          => 'priority.create',
    'description'   => 'A user can create priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un prioridades */
$permission = Permission::create([
    'name'          => 'Edit priority',
    'slug'          => 'priority.edit',
    'description'   => 'A user can edit priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un prioridades */
$permission = Permission::create([
    'name'          => 'Destroy priority',
    'slug'          => 'priority.destroy',
    'description'   => 'A user can destroy priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Tipos permiso del modelo Type
    Listar todos los types
    */
$permission = Permission::create([
    'name'          => 'List type',
    'slug'          => 'type.index',
    'description'   => 'A user can list type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un tipos */
$permission = Permission::create([
    'name'          => 'Show type',
    'slug'          => 'type.show',
    'description'   => 'A user can see type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo tipos */
$permission = Permission::create([
    'name'          => 'Create type',
    'slug'          => 'type.create',
    'description'   => 'A user can create type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un tipos */
$permission = Permission::create([
    'name'          => 'Edit type',
    'slug'          => 'type.edit',
    'description'   => 'A user can edit type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un tipos */
$permission = Permission::create([
    'name'          => 'Destroy type',
    'slug'          => 'type.destroy',
    'description'   => 'A user can destroy type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Estado permiso del modelo Status
    Listar todos los statuss
    */
$permission = Permission::create([
    'name'          => 'List status',
    'slug'          => 'status.index',
    'description'   => 'A user can list status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un estado */
$permission = Permission::create([
    'name'          => 'Show status',
    'slug'          => 'status.show',
    'description'   => 'A user can see status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo estado */
$permission = Permission::create([
    'name'          => 'Create status',
    'slug'          => 'status.create',
    'description'   => 'A user can create status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un estado */
$permission = Permission::create([
    'name'          => 'Edit status',
    'slug'          => 'status.edit',
    'description'   => 'A user can edit status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un estado */
$permission = Permission::create([
    'name'          => 'Destroy status',
    'slug'          => 'status.destroy',
    'description'   => 'A user can destroy status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Tareas permiso del modelo Task
    Listar todos los tasks
    */
$permission = Permission::create([
    'name'          => 'List task',
    'slug'          => 'task.index',
    'description'   => 'A user can list task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un tareas */
$permission = Permission::create([
    'name'          => 'Show task',
    'slug'          => 'task.show',
    'description'   => 'A user can see task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo tareas */
$permission = Permission::create([
    'name'          => 'Create task',
    'slug'          => 'task.create',
    'description'   => 'A user can create task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un tareas */
$permission = Permission::create([
    'name'          => 'Edit task',
    'slug'          => 'task.edit',
    'description'   => 'A user can edit task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un tareas */
$permission = Permission::create([
    'name'          => 'Destroy task',
    'slug'          => 'task.destroy',
    'description'   => 'A user can destroy task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
    Categoria permiso del modelo Category
    Listar todos los categorys
    */
$permission = Permission::create([
    'name'          => 'List category',
    'slug'          => 'category.index',
    'description'   => 'A user can list category',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un categoria */
$permission = Permission::create([
    'name'          => 'Show category',
    'slug'          => 'category.show',
    'description'   => 'A user can see category',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo categoria */
$permission = Permission::create([
    'name'          => 'Create category',
    'slug'          => 'category.create',
    'description'   => 'A user can create category',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un categoria */
$permission = Permission::create([
    'name'          => 'Edit category',
    'slug'          => 'category.edit',
    'description'   => 'A user can edit category',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un categoria */
$permission = Permission::create([
    'name'          => 'Destroy category',
    'slug'          => 'category.destroy',
    'description'   => 'A user can destroy category',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

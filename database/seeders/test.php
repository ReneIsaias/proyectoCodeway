<?php

use App\Models\Permission;

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

/*
Clase permiso del modelo Class
Listar todos los classs
*/
$permission = Permission::create([
    'name'          => 'List class',
    'slug'          => 'class.index',
    'description'   => 'A user can list class',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un clase */
$permission = Permission::create([
    'name'          => 'Show class',
    'slug'          => 'class.show',
    'description'   => 'A user can see class',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo clase */
$permission = Permission::create([
    'name'          => 'Create class',
    'slug'          => 'class.create',
    'description'   => 'A user can create class',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un clase */
$permission = Permission::create([
    'name'          => 'Edit class',
    'slug'          => 'class.edit',
    'description'   => 'A user can edit class',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un clase */
$permission = Permission::create([
    'name'          => 'Destroy class',
    'slug'          => 'class.destroy',
    'description'   => 'A user can destroy class',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Comentario permiso del modelo Comment
Listar todos los comments
*/
$permission = Permission::create([
    'name'          => 'List comment',
    'slug'          => 'comment.index',
    'description'   => 'A user can list comment',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un comentario */
$permission = Permission::create([
    'name'          => 'Show comment',
    'slug'          => 'comment.show',
    'description'   => 'A user can see comment',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo comentario */
$permission = Permission::create([
    'name'          => 'Create comment',
    'slug'          => 'comment.create',
    'description'   => 'A user can create comment',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un comentario */
$permission = Permission::create([
    'name'          => 'Edit comment',
    'slug'          => 'comment.edit',
    'description'   => 'A user can edit comment',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un comentario */
$permission = Permission::create([
    'name'          => 'Destroy comment',
    'slug'          => 'comment.destroy',
    'description'   => 'A user can destroy comment',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Departamento permiso del modelo Departament
Listar todos los departaments
*/
$permission = Permission::create([
    'name'          => 'List departament',
    'slug'          => 'departament.index',
    'description'   => 'A user can list departament',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un departamento */
$permission = Permission::create([
    'name'          => 'Show departament',
    'slug'          => 'departament.show',
    'description'   => 'A user can see departament',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo departamento */
$permission = Permission::create([
    'name'          => 'Create departament',
    'slug'          => 'departament.create',
    'description'   => 'A user can create departament',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un departamento */
$permission = Permission::create([
    'name'          => 'Edit departament',
    'slug'          => 'departament.edit',
    'description'   => 'A user can edit departament',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un departamento */
$permission = Permission::create([
    'name'          => 'Destroy departament',
    'slug'          => 'departament.destroy',
    'description'   => 'A user can destroy departament',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Evento permiso del modelo Event
Listar todos los events
*/
$permission = Permission::create([
    'name'          => 'List event',
    'slug'          => 'event.index',
    'description'   => 'A user can list event',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un evento */
$permission = Permission::create([
    'name'          => 'Show event',
    'slug'          => 'event.show',
    'description'   => 'A user can see event',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo evento */
$permission = Permission::create([
    'name'          => 'Create event',
    'slug'          => 'event.create',
    'description'   => 'A user can create event',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un evento */
$permission = Permission::create([
    'name'          => 'Edit event',
    'slug'          => 'event.edit',
    'description'   => 'A user can edit event',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un evento */
$permission = Permission::create([
    'name'          => 'Destroy event',
    'slug'          => 'event.destroy',
    'description'   => 'A user can destroy event',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Grupo permiso del modelo Groups
Listar todos los groupss
*/
$permission = Permission::create([
    'name'          => 'List groups',
    'slug'          => 'groups.index',
    'description'   => 'A user can list groups',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un grupo */
$permission = Permission::create([
    'name'          => 'Show groups',
    'slug'          => 'groups.show',
    'description'   => 'A user can see groups',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo grupo */
$permission = Permission::create([
    'name'          => 'Create groups',
    'slug'          => 'groups.create',
    'description'   => 'A user can create groups',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un grupo */
$permission = Permission::create([
    'name'          => 'Edit groups',
    'slug'          => 'groups.edit',
    'description'   => 'A user can edit groups',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un grupo */
$permission = Permission::create([
    'name'          => 'Destroy groups',
    'slug'          => 'groups.destroy',
    'description'   => 'A user can destroy groups',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Vacaciones permiso del modelo Holiday
Listar todos los holidays
*/
$permission = Permission::create([
    'name'          => 'List holiday',
    'slug'          => 'holiday.index',
    'description'   => 'A user can list holiday',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un vacaciones */
$permission = Permission::create([
    'name'          => 'Show holiday',
    'slug'          => 'holiday.show',
    'description'   => 'A user can see holiday',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo vacaciones */
$permission = Permission::create([
    'name'          => 'Create holiday',
    'slug'          => 'holiday.create',
    'description'   => 'A user can create holiday',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un vacaciones */
$permission = Permission::create([
    'name'          => 'Edit holiday',
    'slug'          => 'holiday.edit',
    'description'   => 'A user can edit holiday',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un vacaciones */
$permission = Permission::create([
    'name'          => 'Destroy holiday',
    'slug'          => 'holiday.destroy',
    'description'   => 'A user can destroy holiday',
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
Permiso permiso del modelo Permission
Listar todos los permissions
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
Posicion permiso del modelo Position
Listar todos los positions
*/
$permission = Permission::create([
    'name'          => 'List position',
    'slug'          => 'position.index',
    'description'   => 'A user can list position',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Posicion */
$permission = Permission::create([
    'name'          => 'Show position',
    'slug'          => 'position.show',
    'description'   => 'A user can see position',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Posicion */
$permission = Permission::create([
    'name'          => 'Create position',
    'slug'          => 'position.create',
    'description'   => 'A user can create position',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Posicion */
$permission = Permission::create([
    'name'          => 'Edit position',
    'slug'          => 'position.edit',
    'description'   => 'A user can edit position',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Posicion */
$permission = Permission::create([
    'name'          => 'Destroy position',
    'slug'          => 'position.destroy',
    'description'   => 'A user can destroy position',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Aspirantes permiso del modelo Preuser
Listar todos los preusers
*/
$permission = Permission::create([
    'name'          => 'List preuser',
    'slug'          => 'preuser.index',
    'description'   => 'A user can list preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Aspirantes */
$permission = Permission::create([
    'name'          => 'Show preuser',
    'slug'          => 'preuser.show',
    'description'   => 'A user can see preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Aspirantes */
$permission = Permission::create([
    'name'          => 'Create preuser',
    'slug'          => 'preuser.create',
    'description'   => 'A user can create preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Aspirantes */
$permission = Permission::create([
    'name'          => 'Edit preuser',
    'slug'          => 'preuser.edit',
    'description'   => 'A user can edit preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Aspirantes */
$permission = Permission::create([
    'name'          => 'Destroy preuser',
    'slug'          => 'preuser.destroy',
    'description'   => 'A user can destroy preuser',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Prioridad permiso del modelo Priority
Listar todos los prioritys
*/
$permission = Permission::create([
    'name'          => 'List priority',
    'slug'          => 'priority.index',
    'description'   => 'A user can list priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Prioridad */
$permission = Permission::create([
    'name'          => 'Show priority',
    'slug'          => 'priority.show',
    'description'   => 'A user can see priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Prioridad */
$permission = Permission::create([
    'name'          => 'Create priority',
    'slug'          => 'priority.create',
    'description'   => 'A user can create priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Prioridad */
$permission = Permission::create([
    'name'          => 'Edit priority',
    'slug'          => 'priority.edit',
    'description'   => 'A user can edit priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Prioridad */
$permission = Permission::create([
    'name'          => 'Destroy priority',
    'slug'          => 'priority.destroy',
    'description'   => 'A user can destroy priority',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Perfil permiso del modelo Profile
Listar todos los profiles
*/
$permission = Permission::create([
    'name'          => 'List profile',
    'slug'          => 'profile.index',
    'description'   => 'A user can list profile',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Perfil */
$permission = Permission::create([
    'name'          => 'Show profile',
    'slug'          => 'profile.show',
    'description'   => 'A user can see profile',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Perfil */
$permission = Permission::create([
    'name'          => 'Create profile',
    'slug'          => 'profile.create',
    'description'   => 'A user can create profile',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Perfil */
$permission = Permission::create([
    'name'          => 'Edit profile',
    'slug'          => 'profile.edit',
    'description'   => 'A user can edit profile',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Perfil */
$permission = Permission::create([
    'name'          => 'Destroy profile',
    'slug'          => 'profile.destroy',
    'description'   => 'A user can destroy profile',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Proyecto permiso del modelo Project
Listar todos los projects
*/
$permission = Permission::create([
    'name'          => 'List project',
    'slug'          => 'project.index',
    'description'   => 'A user can list project',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Proyecto */
$permission = Permission::create([
    'name'          => 'Show project',
    'slug'          => 'project.show',
    'description'   => 'A user can see project',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Proyecto */
$permission = Permission::create([
    'name'          => 'Create project',
    'slug'          => 'project.create',
    'description'   => 'A user can create project',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Proyecto */
$permission = Permission::create([
    'name'          => 'Edit project',
    'slug'          => 'project.edit',
    'description'   => 'A user can edit project',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Proyecto */
$permission = Permission::create([
    'name'          => 'Destroy project',
    'slug'          => 'project.destroy',
    'description'   => 'A user can destroy project',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

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
/* Ver en detalle a un Rol */
$permission = Permission::create([
    'name'          => 'Show role',
    'slug'          => 'role.show',
    'description'   => 'A user can see role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Rol */
$permission = Permission::create([
    'name'          => 'Create role',
    'slug'          => 'role.create',
    'description'   => 'A user can create role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Rol */
$permission = Permission::create([
    'name'          => 'Edit role',
    'slug'          => 'role.edit',
    'description'   => 'A user can edit role',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Rol */
$permission = Permission::create([
    'name'          => 'Destroy role',
    'slug'          => 'role.destroy',
    'description'   => 'A user can destroy role',
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
/* Ver en detalle a un Estado */
$permission = Permission::create([
    'name'          => 'Show status',
    'slug'          => 'status.show',
    'description'   => 'A user can see status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Estado */
$permission = Permission::create([
    'name'          => 'Create status',
    'slug'          => 'status.create',
    'description'   => 'A user can create status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Estado */
$permission = Permission::create([
    'name'          => 'Edit status',
    'slug'          => 'status.edit',
    'description'   => 'A user can edit status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Estado */
$permission = Permission::create([
    'name'          => 'Destroy status',
    'slug'          => 'status.destroy',
    'description'   => 'A user can destroy status',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Tarea permiso del modelo Task
Listar todos los tasks
*/
$permission = Permission::create([
    'name'          => 'List task',
    'slug'          => 'task.index',
    'description'   => 'A user can list task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Tarea */
$permission = Permission::create([
    'name'          => 'Show task',
    'slug'          => 'task.show',
    'description'   => 'A user can see task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Tarea */
$permission = Permission::create([
    'name'          => 'Create task',
    'slug'          => 'task.create',
    'description'   => 'A user can create task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Tarea */
$permission = Permission::create([
    'name'          => 'Edit task',
    'slug'          => 'task.edit',
    'description'   => 'A user can edit task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Tarea */
$permission = Permission::create([
    'name'          => 'Destroy task',
    'slug'          => 'task.destroy',
    'description'   => 'A user can destroy task',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Tipo permiso del modelo Type
Listar todos los types
*/
$permission = Permission::create([
    'name'          => 'List type',
    'slug'          => 'type.index',
    'description'   => 'A user can list type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Tipo */
$permission = Permission::create([
    'name'          => 'Show type',
    'slug'          => 'type.show',
    'description'   => 'A user can see type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Tipo */
$permission = Permission::create([
    'name'          => 'Create type',
    'slug'          => 'type.create',
    'description'   => 'A user can create type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Tipo */
$permission = Permission::create([
    'name'          => 'Edit type',
    'slug'          => 'type.edit',
    'description'   => 'A user can edit type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Tipo */
$permission = Permission::create([
    'name'          => 'Destroy type',
    'slug'          => 'type.destroy',
    'description'   => 'A user can destroy type',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;

/*
Usuario permiso del modelo User
Listar todos los users
*/
$permission = Permission::create([
    'name'          => 'List user',
    'slug'          => 'user.index',
    'description'   => 'A user can list user',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Ver en detalle a un Usuario */
$permission = Permission::create([
    'name'          => 'Show user',
    'slug'          => 'user.show',
    'description'   => 'A user can see user',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite crear un nuevo Usuario */
$permission = Permission::create([
    'name'          => 'Create user',
    'slug'          => 'user.create',
    'description'   => 'A user can create user',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite editar un Usuario */
$permission = Permission::create([
    'name'          => 'Edit user',
    'slug'          => 'user.edit',
    'description'   => 'A user can edit user',
]);
/* Agregamos a la variable permission el id del permiso creado */
$permission_all[] = $permission->id;
/* Permite eliminar un Usuario */
$permission = Permission::create([
    'name'          => 'Destroy user',
    'slug'          => 'user.destroy',
    'description'   => 'A user can destroy user',
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

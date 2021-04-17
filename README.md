# SISTEMA DE PLANIFICACIÓN DE RECURSOS EMPRESARIAL CODEWAY SOLUCIONES INTEGRALES

### Este es un sistema de planificación de recursos empresariales para la empresa Codeway Soluciones Integrales con los módulos de recursos humanos y productividad.

## Configuración de Instalación

### Siga estos pasos para llevar a cabo la configuración del sistema

-   Clone este repositorio :

```bash
$ git clone https://github.com/ReneIsaiasMateos98/codeway_erp.git
```

-   Instale o actulize composer dentro de la carpate de codeway_erp :

```bash
  # Solo ejecute una de las dos
$ composer install || composer update
```

-   Copie el archivo .env.example a .env :

```bash
$ cp .env.example .env
```

-   Configure su sistema gestor de base de datos, usuario y contraseña en el archivo .env :

```bash
# Esto se configura dentro del archivo .env
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=codeway_erp
 DB_USERNAME=root
 DB_PASSWORD=password
```

Guarde cambios y cierre

-   Genere la llave pública para su proyecto con el comando :

```bash
$ php artisan key:generate
```

-   Ejecute este comando para migrar todas las tablas :

```bash
$ php artisan migrate
```

-   Poble la base de datos con siembras y fabricas de datos, para eso configure las siembras que quiera ejecutar asi como las fabricas de datos, estos estan en el archivo DatabaseSeeder.php en la ruta de :

```bash
#Edite este archivo desde cualquier editor de texto
$ cd database/seeders/DatabaseSeeder.php
```

Configure los archivos que quiera que se ejecuten.

Solo tenga en cuenta que las siembras de RolSeeder.php y PermissionListSeeder.php se deben de ejecutar si o sí.

-   Ahora para poblar la base de datos ejecute este comando :

```bash
#Solo ejecute uno de los dos comandos
$ php artisan db:seed
```

-   Ahora instale o actulize todas las dependencias de este proyecto, para eso ejecute es comando :

```bash
$ npm install || npm update
```

-   Una vez instalado todas las dependecias, compile los scripts para generar los css y js mas comprimidos y minimizados :

```bash
$ npm run dev
```

-   Ahora ejecute este comando para generar un acceso a la carpeta storage en la carpeta publica :

```bash
$ php artisan storage:link
```

-   Debe de agregar una imagen con el nombre "user.png" en la ruta :

```bash
$ cd storage/app/public/users/user.png
```

Esta imagen es la que se le asignara a todos los usuarios por defecto.

-   Por último inicie el servidor de artisan para ver el proyecto corriendo

```bash
$ php artisan serve
```

-   Para acceder revise las credenciales quee estan en el archivo RolSeeder.php

## Software utilizado para este proyecto

### El software que se utilizo para realizar este proyecto es de codigo open source.

Repositorios y documentación de herramientas

-   [Laravel 8](https://laravel.com/docs/8.x)
-   [Laravel Livewire](https://laravel-livewire.com/docs)
-   [Laravel Fortify](https://github.com/laravel/fortify)
-   [AdminLTE](https://github.com/ColorlibHQ/AdminLTE)
-   [Bootstrap](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
-   [Font Awesome](https://fontawesome.com/how-to-use/on-the-web/referencing-icons/basic-use)
-   [Toastr](https://github.com/CodeSeven/toastr)

Para mas información visite la documentación de cada herramienta o software

## Soporte

Sistema realizado por René Isaias Mateos para la empresa Codeway Soluciones Integrales

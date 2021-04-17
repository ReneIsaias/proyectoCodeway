<aside class="main-sidebar sidebar-dark-primary elevation-3">
    <a href="{{ url('/home') }}" class="brand-link elevation-1">
        <img src="{{ asset('favicons/logo_codeway.png') }}" class="logo_empresa">
    </a>
    <div class="sidebar">
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Principal</p>
                    </a>
                </li>

                @can('haveaccess', 'task.index')
                    <li class="nav-item">
                        <a href="{{ route('task.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Tareas</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'type.index')
                    <li class="nav-item">
                        <a href="{{ route('type.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-crop-alt"></i>
                            <p>Tipos</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'priority.index')
                    <li class="nav-item">
                        <a href="{{ route('priority.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-ol"></i>
                            <p>Prioridades</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'status.index')
                    <li class="nav-item">
                        <a href="{{ route('status.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>Estados</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'project.index')
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-project-diagram"></i>
                            <p>Proyectos</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'category.index')
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Categorías</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'class.index')
                    <li class="nav-item">
                        <a href="{{ route('class.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>Clases</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'holiday.index')
                    <li class="nav-item">
                        <a href="{{ route('holiday.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-plane-departure"></i>
                            <p>Vacaciones</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'period.index')
                    <li class="nav-item">
                        <a href="{{ route('period.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-thumbtack"></i>
                            <p>Periodos</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'absence.index')
                    <li class="nav-item">
                        <a href="{{ route('absence.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-slash"></i>
                            <p>Ausencias</p>
                        </a>
                    </li>
                @endcan



                @can('haveaccess', 'vacant.index')
                    <li class="nav-item">
                        <a href="{{ route('vacant.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Vacantes</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'preuser.index')
                    <li class="nav-item">
                        <a href="{{ route('preuser.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-portrait"></i>
                            <p>Aspirantes</p>
                        </a>
                    </li>
                @endcan



                @can('haveaccess', 'user.index')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'event.index')
                    <li class="nav-item">
                        <a href="{{ route('event.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Eventos</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'departament.index')
                    <li class="nav-item">
                        <a href="{{ route('departament.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Departamentos</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'area.index')
                    <li class="nav-item">
                        <a href="{{ route('group.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>Áreas</p>
                        </a>
                    </li>
                @endcan


                @can('haveaccess', 'role.index')
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @endcan

                @can('haveaccess', 'permission.index')
                    <li class="nav-item">
                        <a href="{{ route('permission.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>Permisos</p>
                        </a>
                    </li>
                @endcan


                <label class="text-white" for="Configuracion">AJUSTES DE MI CUENTA</label>

                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Configurar Perfil</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('mydepartament') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Mi Departamento</p>
                    </a>
                </li>

                @can('haveaccess', 'event.index')
                    <li class="nav-item">
                        <a href="{{ route('myevent') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Mis Eventos</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('myvacation') }}" class="nav-link">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>Mis Vacaciones</p>
                    </a>
                </li>

                <hr>

                <button class="btn btn-outline-danger">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-white">
                        Cerrar Sesión
                    </a>
                </button>
            </ul>
        </nav>
    </div>
</aside>

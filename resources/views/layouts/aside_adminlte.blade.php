<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link logo-switch">
        <img src="{{ asset('favicons/logo_img.png') }}" alt="Codeway"
            class="brand-image img-circle elevation-3 logo-xs">
        <img src="{{ asset('favicons/logo_img_xl-2.png') }}" alt="Codeway" class="brand-image-xs logo-xl">
    </a>
    <div
        class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-overflow os-host-overflow-y">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 0px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent"
                            data-widget="treeview" role="menu" data-animation-speed="500">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('home') }}">
                                    <i class="fas fa-fw fa-home"></i>
                                    <p>Principal</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview menu-open">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-tasks"></i>
                                    <p>
                                        Tareas
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('task.index') }}">
                                            <i class="fas fa-fw fa-tasks"></i>
                                            <p>Tareas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('type.index') }}">
                                            <i class="fas fa-fw fa-crop-alt"></i>
                                            <p>Tipos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('priority.index') }}">
                                            <i class="fas fa-fw fa-list-ol"></i>
                                            <p>Prioridades</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('status.index') }}">
                                            <i class="fas fa-fw fa-spinner"></i>
                                            <p>Estados</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-project-diagram"></i>
                                    <p>
                                        Proyectos
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('project.index') }}">
                                            <i class="fas fa-fw fa-project-diagram"></i>
                                            <p>Proyectos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('class.index') }}">
                                            <i class="fas fa-fw fa-layer-group"></i>
                                            <p>Clases</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-plane-departure"></i>
                                    <p>
                                        Vacaciones
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('holiday.index') }}">
                                            <i class="fas fa-fw fa-plane-departure"></i>
                                            <p>
                                                Vacaciones
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('period.index') }}">
                                            <i class="fas fa-fw fa-thumbtack"></i>
                                            <p>
                                                Periodos
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('absence.index') }}">
                                            <i class="fas fa-fw fa-user-slash"></i>
                                            <p>
                                                Ausencias
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-clipboard"></i>
                                    <p>
                                        Vacantes
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('vacant.index') }}">
                                            <i class="fas fa-fw fa-clipboard"></i>
                                            <p>
                                                Vacantes
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('preuser.index') }}">
                                            <i class="fas fa-fw fa-portrait"></i>
                                            <p>
                                                Aspirantes
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="fas fa-fw fa-users"></i>
                                    <p>
                                        Usuarios
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('event.index') }}">
                                    <i class="fas fa-fw fa-calendar-check"></i>
                                    <p>
                                        Eventos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-building"></i>
                                    <p>
                                        Departamentos
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('departament.index') }}">
                                            <i class="fas fa-fw fa-building"></i>
                                            <p>
                                                Departamentos
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('group.index') }}">
                                            <i class="fas fa-fw fa-user-friends"></i>
                                            <p>
                                                Áreas
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link" href="">
                                    <i class="fas fa-fw fa-user-tag"></i>
                                    <p>
                                        Roles
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('role.index') }}">
                                            <i class="fas fa-fw fa-user-tag"></i>
                                            <p>
                                                Roles
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('permission.index') }}">
                                            <i class="fas fa-fw fa-user-lock"></i>
                                            <p>
                                                Permisos
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header">
                                AJUSTES DE LA CUENTA
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">
                                    <i class="fas fa-fw fa-user-tie"></i>
                                    <p>
                                        Configurar Perfil
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mydepartament') }}">
                                    <i class="fas fa-fw fa-house-user"></i>
                                    <p>
                                        Mi Departamento
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('myevent') }}">
                                    <i class="fas fa-fw fa-calendar-check"></i>
                                    <p>
                                        Mis Eventos
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 99.7297%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
</aside>

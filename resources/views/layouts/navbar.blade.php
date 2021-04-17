{{-- <nav class="main-header navbar navbar-expand navbar-dark elevation-2">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link" data-widget="pushmenu">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <img src="{{ asset('storage/users/user.png') }}" width="7%" style="margin-right: .5rem;" class="rounded-circle" alt="{{ Auth::user()->adminlte_image() }}">
        <li class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">Mi Perfil</a>
                <a class="dropdown-item" href="{{ route('mydepartament') }}">Mi Departamento</a>
                <a class="dropdown-item" href="{{ route('myevent') }}">Mis Eventos</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </div>
        </li>
    </ul>
</nav> --}}

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link" data-widget="pushmenu">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu show">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{ asset(Auth::user()->adminlte_image()) }}" class="user-image img-circle elevation-2" alt="{{ Auth::user()->adminlte_image() }}">
                    <span class="d-none d-md-inline">
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right hide" style="left: inherit; right: 0px;">
                    <li class="user-header bg-dark elevation-3">
                        <img src="{{ asset(Auth::user()->adminlte_image()) }}" class="img-circle elevation-2" alt="{{ Auth::user()->adminlte_image() }}">
                        <p>
                            {{ Auth::user()->name }}
                            <small>{{ Auth::user()->adminlte_desc() }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="{{ route('profile') }}" class="btn btn-default btn-flat">
                            <i class="fa fa-fw fa-user"></i>
                            Perfil
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">
                            <i class="fa fa-fw fa-power-off">

                            </i>
                            Salir
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

{{-- <nav class="main-header navbar navbar-expand navbar-dark elevation-2">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link" data-widget="pushmenu">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </li>
        <li class="nav-item">
            <img src="{{ asset('storage/users/user.png') }}" width="9%" class="rounded-circle" alt="{{ Auth::user()->id }}">
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
        </li>
    </ul>
</nav> --}}

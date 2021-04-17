<div wire:ignore.self class="modal fade" id="showUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showUsuarioModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showUsuarioModal">MOSTRAR USUARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-muted" for="nombre">Nombre:</label>
                                <h5>{{ $nameUser }} {{ $firstLastname }} {{ $secondLastname }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="phone">Teléfono:</label>
                                <h5>{{ $phone }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="name">Nombre de usuario:</label>
                                <h5>{{ $name }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="email">Email Corporativo:</label>
                                <h5>{{ $email }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="email">Email:</label>
                                <h5>{{ $corporative }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="estado">Estado:</label>
                                @if ($status == "1")
                                    <h5>Activo</h5>
                                @else
                                    <h5>Inactivo</h5>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="role">Rol</label>
                                <h5>{{ $role }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="departament">Departamento</label>
                                <h5>{{ $departament }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="group">Área</label>
                                <h5>{{ $group }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="created_at">Creado:</label>
                                <h5>{{ $created_at }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="updated_at">Actualizado:</label>
                                <h5>{{ $updated_at }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-muted" for="name">Avatar</label>
                                <div>
                                    <img class="img-fluid" alt="{{$avatar}}" src="{{ asset('storage/users/' . $avatar) }}">
                                </div>
                                <div wire:loading wire:target="avatar">Cargando...</div>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="description">Descripción:</label>
                                <h5>{{ $description }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="description">Redes sociales</label>
                            </div>
                            @isset($github)
                                <div class="form-group">
                                    <link class="fab fa-fw fa-github" rel="icon">
                                    <a class="text-uppercase" href="{{ $github }}">GitHub</a>
                                </div>
                            @endisset
                            @isset($instagram)
                                <div class="form-group">
                                    <link class="fab fa-fw fa-instagram" rel="icon">
                                    <a class="text-uppercase" href="{{ $instagram }}">Instagram</a>
                                </div>
                            @endisset
                            @isset($facebook)
                                <div class="form-group">
                                    <link class="fab fa-fw fa-facebook" rel="icon">
                                    <a class="text-uppercase" href="{{ $facebook }}">Facebook</a>
                                </div>
                            @endisset
                            @isset($website)
                                <div class="form-group">
                                    <link class="fas fa-fw fa-desktop" rel="icon">
                                    <a class="text-uppercase" href="{{ $website }}">Sitio web</a>
                                </div>
                            @endisset
                            @isset($other)
                                <div class="form-group">
                                    <link class="fas fa-fw fa-blog" rel="icon">
                                    <a class="text-uppercase" href="{{ $other }}">Otro</a>
                                </div>
                            @endisset
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-info" wire:click.prevent="close()">Aceptar</button>
            </div>
        </div>
    </div>
</div>

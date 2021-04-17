<div wire:ignore.self class="modal fade" id="showRole" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showClassModal">MOSTRAR ROL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if ($fullAccess != "yes")
                        <div class="col-lg-5 mb-4">
                    @else
                        <div class="col-lg-12 mb-4">
                    @endif
                        <form>
                            <div class="form-group">
                                <label class="text-muted" for="name">Nombre:</label>
                                <h5>{{ $name }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="slug">Identificador:</label>
                                <h5>{{ $slug }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="description">Descripción:</label>
                                <h5>{{ $description }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="description">Responsable:</label>
                                <h5>{{ $responsable }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="description">Acceso total:</label>
                                @if ($fullAccess == "yes")
                                    <h5>Si</h5>
                                @else
                                    <h5>No</h5>
                                @endif
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
                                <label class="text-muted" for="range">Rango:</label>
                                <h5>{{ $range }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="asignament">Asignamiento:</label>
                                @if ($asignament == "0")
                                    <h5>Ninguno</h5>
                                @elseif($asignament == "1")
                                    <h5>Departamento</h5>
                                @elseif($asignament == "2")
                                    <h5>Área</h5>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="created_at">Creado:</label>
                                <h5>{{ $created_at }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="updated_at">Actualizado:</label>
                                <h5>{{ $updated_at }}</h5>
                            </div>
                        </form>
                    </div>
                    @if ($fullAccess != "yes")
                        <div class="col-lg-6 mb-4">
                            <div class="form-group">
                                <label class="text-muted text-uppercase" for="permisos">Lista de Permisos</label>
                                <div class="table-responsive" style="height: 45rem">
                                    @foreach ($permissions as $permission)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" disabled class="custom-control-input"
                                                id="permission_{{ $permission->id }}" wire:model="permission_role"
                                                value="{{ $permission->id }}"
                                                @if(is_array($permission_role) && in_array("$permission->id", $permission_role))
                                                    checked
                                                @endif
                                            >
                                            <label class="custom-control-label"
                                                for="permission_{{ $permission->id }}">
                                                {{ $permission->id }}
                                                -
                                                {{ $permission->name }}
                                                <em>( {{ $permission->description }} )</em>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
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

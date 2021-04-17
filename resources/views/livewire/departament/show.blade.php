<div wire:ignore.self class="modal fade" id="showDepartament" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showDepartamentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showDepartamentModal">MOSTRAR DEPARTAMENTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="name">Nombre:</label>
                        <h5>{{ $name }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Descripción:</label>
                        <h5>{{ $description }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="responsable">Responsable:</label>
                        <h5>{{ $responsable }}</h5>
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
                        <label class="text-muted" for="created_at">Creado:</label>
                        <h5>{{ $created_at }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="updated_at">Actualizado:</label>
                        <h5>{{ $updated_at }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted text-uppercase" for="updated_at">Áreas que pertencen a este departamento</label>
                        <div class="table-responsive">
                            <table class="table table-white table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Área</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Responsable</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        @if(is_array($departament_group) && in_array("$group->id", $departament_group))
                                            <tr>
                                                <td>{{ $group->name }}</td>
                                                <td>{{ $group->description }}</td>
                                                <td>{{ $group->responsable }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
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

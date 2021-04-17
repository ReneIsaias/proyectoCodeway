<div wire:ignore.self class="modal fade" id="showType" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showTypeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showTypeModal">MOSTRAR TIPO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="description">Descripción:</label>
                        <h5>{{ $description }}</h5>
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
                    <div class="form-group ">
                        <label class="text-muted text-uppercase" for="updated_at">Tareas relacionadas con este tipo</label>
                        <div class="table-responsive">
                            <table class="table table-white table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Tarea</th>
                                        <th scope="col">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tareas as $tarea)
                                        @if ($type_id == $tarea->type_id)
                                            <tr>
                                                <td>{{ $tarea->name }}</td>
                                                <td>{{ $tarea->description }}</td>
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

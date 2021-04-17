<div wire:ignore.self class="modal fade" id="showAbsence" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showClassModal">MOSTRAR AUSENCIA</h5>
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
                            <h5>Activa</h5>
                        @else
                            <h5>Inactiva</h5>
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
                    {{-- <div class="form-group ">
                        <label class="text-muted text-uppercase" for="updated_at">Vacaciones relacionadas con esta ausencia</label>
                        <div class="table-responsive">
                            <table class="table table-white table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Días</th>
                                        <th scope="col">Inicio</th>
                                        <th scope="col">Terminó</th>
                                        <th scope="col">En proceso</th>
                                        <th scope="col">Tomadas</th>
                                        <th scope="col">Disponibles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacaciones as $vacacion)
                                        @if ($absence_id == $vacacion->absence_id)
                                            <tr>
                                                <td>{{ $vacacion->days }}</td>
                                                <td>{{ $vacacion->beginDate }}</td>
                                                <td>{{ $vacacion->endDate }}</td>
                                                <td>{{ $vacacion->inProcess }}</td>
                                                <td>{{ $vacacion->taken }}</td>
                                                <td>{{ $vacacion->available }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
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

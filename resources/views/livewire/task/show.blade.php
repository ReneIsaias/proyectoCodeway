<div wire:ignore.self class="modal fade" id="showTask" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showTaskModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showTaskModal">MOSTRAR TAREA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="description">Nombre:</label>
                        <h5>{{ $name }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Descripción:</label>
                        <h5>{{ $description }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Archivo:</label><br>
                        @if ($file != null)
                            <a href="{{ asset('storage/files/' .$file) }}">{{ $file }}</a>
                        @else
                            <h5>No hay archivo en esta tarea</h5>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Inicio:</label>
                        <h5>{{ $start }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Termino:</label>
                        <h5>{{ $end }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Informador:</label>
                        <h5>{{ $informer }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Responsable:</label>
                        <h5>{{ $responsable }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Estado:</label>
                        @isset($estado)
                            <h5>{{ $estado }}</h5>
                        @endisset
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Tipo:</label>
                        @isset($tipo)
                            <h5>{{ $tipo }}</h5>
                        @endisset
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Prioridad:</label>
                        @isset($prioridad)
                            <h5>{{ $prioridad }}</h5>
                        @endisset
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

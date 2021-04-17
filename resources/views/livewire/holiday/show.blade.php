<div wire:ignore.self class="modal fade" id="showHoliday" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showHolidayModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showHolidayModal">MOSTRAR VACACIÓN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="beginDate">Incio:</label>
                                <h5>{{ $beginDate }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="endDate">Termino:</label>
                                <h5>{{ $endDate }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="days">Días:</label>
                                <h5>{{ $days }}</h5>
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="inProcess">En proceso:</label>
                                <h5>{{ $inProcess }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="taken">Tomadas:</label>
                                <h5>{{ $taken }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="available">Viables:</label>
                                <h5>{{ $available }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="estado">Estado:</label>
                                @if ($status == "1")
                                    <h5>Activo</h5>
                                @else
                                    <h5>Inactivo</h5>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            @foreach ($usuarios as $responsable)
                                @if ($responsable->id == $user_id)
                                    <img src="{{ asset('storage/users/' . $responsable->profile->avatar) }}" width="50%" class="rounded-circle" alt="{{ $responsable->profile->avatar }}"><br>
                                    <label class="text-muted text-uppercase"> {{ $responsable->name}} </label>
                                @endif
                            @endforeach
                            <div class="form-group">
                                <label class="text-muted" for="responsa">Responsable:</label>
                                <h5>{{ $responsa }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="commentable">Comentario:</label>
                                <h5>{{ $commentable }}</h5>
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="ausencia">Ausencia:</label>
                                @isset($ausencia)
                                    <h5>{{ $ausencia }}</h5>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="periodo">Periodo:</label>
                        @isset($periodo)
                            <h5>{{ $periodo }}</h5>
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

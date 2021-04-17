<div wire:ignore.self class="modal fade" id="updateHoliday" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateHolidayModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateHolidayModal">MODIFICAR VACACIÓN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted text-uppercase" for="inicio">Inicio en {{$created_at}}</label>
                        <label class="text-muted text-uppercase" for="end">Termina en {{$endDate}}</label>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="user_id">Usuario </label>
                        <select wire:model="user_id" class="form-control @error('user_id') is-invalid @enderror" readonly name="user_id" wire:dirty.class="bg-success">
                            <option value="">--Seleccione al usuario--</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}"
                                    @isset( $usuario->name )
                                        @if( $usuario->name )
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $usuario->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-muted" for="days">Días:</label>
                                <input type="numeric" name="days" class="form-control @error('days') is-invalid @enderror"
                                        wire:model="days" wire:dirty.class="bg-success">
                                @error('days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-muted" for="inProcess">En proceso:</label>
                                <input type="numeric" name="inProcess" class="form-control @error('inProcess') is-invalid @enderror"
                                        wire:model="inProcess" wire:dirty.class="bg-success">
                                @error('inProcess')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-muted" for="taken">Tomadas:</label>
                                <input type="numeric" name="taken" class="form-control @error('taken') is-invalid @enderror"
                                        wire:model="taken" wire:dirty.class="bg-success">
                                @error('taken')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="text-muted" for="available">Viables:</label>
                                <input type="numeric" name="available" class="form-control @error('available') is-invalid @enderror"
                                        wire:model="available" wire:dirty.class="bg-success">
                                @error('available')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="created_at">Inicio:</label>
                                <input type="datetime-local" name="created_at" wire:dirty.class="bg-success"
                                    class="form-control @error('created_at') is-invalid @enderror" wire:model="created_at">
                                @error('created_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="endDate">Termino:</label>
                                <input type="date" name="endDate" wire:dirty.class="bg-success"
                                    class="form-control @error('endDate') is-invalid @enderror" wire:model="endDate">
                                @error('endDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="text-muted" for="commentable">Comentario:</label>
                        <textarea class="form-control @error('commentable') is-invalid @enderror" name="commentable" wire:model="commentable" wire:dirty.class="bg-success" rows="3"></textarea>
                        @error('commentable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="responsable">Responsable </label>
                        <select wire:model="responsable" class="form-control @error('responsable') is-invalid @enderror"  name="responsable" wire:dirty.class="bg-success">
                            <option value="">--Seleccione al responsable--</option>
                            @foreach($responsables as $responsable)
                                <option  value="{{ $responsable->name }}"
                                    @isset( $responsable->name )
                                        @if( $responsable->name )
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $responsable->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('responsable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="absence_id">Ausencia:</label>
                        <select wire:model="absence_id" class="form-control @error('absence_id') is-invalid @enderror"  name="absence_id" wire:dirty.class="bg-success">
                            <option value="">--Seleccione la ausencia--</option>
                            @foreach($ausencias as $ausencia)
                                <option  value="{{ $ausencia->id }}"
                                    @isset( $ausencia->description )
                                        @if( $ausencia->description )
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $ausencia->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('absence_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="period_id">Periodo:</label>
                        <select wire:model="period_id" class="form-control @error('period_id') is-invalid @enderror"  name="period_id" wire:dirty.class="bg-success">
                            <option value="">--Seleccione el periodo--</option>
                            @foreach($periodos as $periodo)
                                <option  value="{{ $periodo->id }}"
                                    @isset( $periodo->description )
                                        @if( $periodo->description )
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $periodo->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('period_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="status">Estado:</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="statusType1" wire:model="status" name="status" class="custom-control-input" value="1"
                                @if ( $status == "1" )
                                    checked
                                @endif
                            >
                            <label class="custom-control-label" for="statusType1">En proceso</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="statusType0" wire:model="status" name="status" class="custom-control-input" value="2"
                                @if ( $status == "2" )
                                    checked
                                @endif
                            >
                            <label class="custom-control-label" for="statusType0">Aceptar</label>
                            <hr>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-success" wire:click.prevent="update()">Actualizar Vacación</button>
            </div>
        </div>
    </div>
</div>

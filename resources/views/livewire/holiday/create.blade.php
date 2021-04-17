<div wire:ignore.self class="modal fade" id="createHoliday" data-backdrop="static" role="document" data-keyboard="false" tabindex="-1" aria-labelledby="createHolidayModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createHolidayModal">AGREGAR VACACIÓN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="user_id">Usuario </label>
                        <select wire:model="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" wire:dirty.class="bg-primary">
                            <option value="">--Seleccione al usuario correspondiente--</option>
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
                    <div class="form-group">
                        <label class="text-muted" for="beginDate">Fecha de inicio:</label>
                        <input type="date" name="beginDate" class="form-control @error('beginDate') is-invalid @enderror"
                                wire:model="beginDate" wire:dirty.class="bg-primary">
                        @error('beginDate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="responsable">Responsable:</label>
                        <select wire:model="responsable" class="form-control @error('responsable') is-invalid @enderror" name="responsable" wire:dirty.class="bg-primary">
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
                        <label class="text-muted" for="period_id">Periodo:</label>
                        <select wire:model="period_id" class="form-control @error('period_id') is-invalid @enderror"  name="period_id" wire:dirty.class="bg-primary">
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
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Vacación</button>
                </div>
            </div>
        </div>
    </div>
</div>

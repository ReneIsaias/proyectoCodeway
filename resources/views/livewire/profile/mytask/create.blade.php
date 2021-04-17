<div wire:ignore.self class="modal fade" id="createTask" data-backdrop="static" role="document" data-keyboard="false" tabindex="-1" aria-labelledby="createTaskModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createTaskModal">AGREGAR TAREA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                wire:model="name" wire:dirty.class="bg-primary">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="description">Descripción:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" wire:model="description" wire:dirty.class="bg-primary" rows="3"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="temporary">Archivo:</label>
                        <input type="file" name="temporary" class="form-control-file @error('temporary') is-invalid @enderror"
                                wire:model="temporary" wire:dirty.class="bg-primary">
                        @error('temporary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="inicia">Fecha inicio:</label>
                                <input type="date" name="inicia" class="form-control @error('inicia') is-invalid @enderror"
                                        wire:model="inicia" wire:dirty.class="bg-primary">
                                @error('inicia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="termina">Fecha termino:</label>
                                <input type="date" name="termina" class="form-control @error('termina') is-invalid @enderror"
                                        wire:model="termina" wire:dirty.class="bg-primary">
                                @error('termina')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="informer">Informador:</label>
                                @foreach ($pivote as $pivot)
                                    <select select wire:model="informer" class="form-control @error('informer') is-invalid @enderror" name="informer" wire:dirty.class="bg-primary">
                                        <option value="">--Seleccione el informador--</option>
                                        @foreach ($pivot->users as $user)
                                            <option value="{{ $user->name }}"
                                                @isset( $user->name )
                                                    @if( $user->name )
                                                        selected
                                                    @endif
                                                @endisset
                                                >
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endforeach
                                @error('informer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="statu_id">Estado:</label>
                                <select wire:model="statu_id" class="form-control @error('statu_id') is-invalid @enderror" name="statu_id" wire:dirty.class="bg-primary">
                                    <option value="">--Seleccione el estado--</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}"
                                            @isset( $estado->description )
                                                @if( $estado->description )
                                                    selected
                                                @endif
                                            @endisset
                                            >
                                            {{ $estado->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('statu_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="type_id">Tipo:</label>
                                <select wire:model="type_id" class="form-control @error('type_id') is-invalid @enderror"  name="type_id" wire:dirty.class="bg-primary">
                                    <option value="">--Seleccione el tipo--</option>
                                    @foreach($types as $type)
                                        <option  value="{{ $type->id }}"
                                            @isset( $type->description )
                                                @if( $type->description )
                                                    selected
                                                @endif
                                            @endisset
                                            >
                                            {{ $type->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="priority_id">Prioridad:</label>
                                <select wire:model="priority_id" class="form-control @error('priority_id') is-invalid @enderror"  name="priority_id" wire:dirty.class="bg-primary">
                                    <option value="">--Seleccione la prioridad--</option>
                                    @foreach($priorities as $priority)
                                        <option  value="{{ $priority->id }}"
                                            @isset( $priority->description )
                                                @if( $priority->description )
                                                    selected
                                                @endif
                                            @endisset
                                            >
                                            {{ $priority->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('priority_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Tarea</button>
                </div>
            </div>
        </div>
    </div>
</div>

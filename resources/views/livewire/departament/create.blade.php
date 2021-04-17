<div wire:ignore.self class="modal fade" id="createDepartament" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createDepartamentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createDepartamentModal">AGREGAR DEPARTAMENTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
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
                                <label class="text-muted" for="responsable">Responsable:</label>
                                <select wire:model="responsable" class="form-control @error('responsable') is-invalid @enderror" name="responsable" wire:dirty.class="bg-primary" id="departament">
                                    <option value="">--Seleccione el responsable--</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{$usuario->name}}">
                                            {{ $usuario->nameUser }} {{ $usuario->firstLastname }} {{ $usuario->secondLastname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('responsable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-muted text-uppercase" for="grupo">Lista de Áreas</label>
                                <div class="table-responsive" style="height: 25rem;">
                                    @forelse ($groups as $grupo )
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="group_{{ $grupo->id }}" wire:model="group"
                                                value="{{ $grupo->id }}"
                                                @if(is_array(old('group')) && in_array("$grupo->id", old('group')))
                                                    checked
                                                @endif
                                            >
                                            <label class="custom-control-label"
                                                for="group_{{ $grupo->id }}">
                                                {{ $grupo->id }}
                                                -
                                                {{ $grupo->name }}
                                                <em>( {{ $grupo->description }} )</em>
                                            </label>
                                        </div>
                                    @empty
                                        <li>No hay áreaas registradas</li>
                                    @endforelse
                                </div>
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
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Departamento</button>
                </div>
            </div>
        </div>
    </div>
</div>

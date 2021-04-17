<div wire:ignore.self class="modal fade" id="updateDepartament" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateDepartamentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateDepartamentModal">MODIFICAR DEPARTAMENTO</h5>
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
                                <input type="text" name="name" wire:dirty.class="bg-success"
                                    class="form-control @error('name') is-invalid @enderror" wire:model="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="description">Descripción:</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" wire:model="description" wire:dirty.class="bg-success" rows="3"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="responsable">Responsable:</label>
                                <select wire:model="responsable" class="form-control @error('responsable') is-invalid @enderror"  name="responsable" wire:dirty.class="bg-success">
                                    <option value="">--Seleccione el responsable--</option>
                                    @foreach($usuarios as $usuario)
                                        <option  value="{{ $usuario->name }}"
                                            @isset( $usuario->name )
                                                @if( $usuario->name )
                                                    selected
                                                @endif
                                            @endisset
                                            >
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
                            <div class="form-group">
                                <label class="text-muted" for="color">Estado:</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="statusType1" wire:model="status" name="status" class="custom-control-input" value="1"
                                        @if ( $status == "1" )
                                            checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="statusType1">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="statusType0" wire:model="status" name="status" class="custom-control-input" value="0"
                                        @if ( $status == "0" )
                                            checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="statusType0">Inactivo</label>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-muted text-uppercase" for="grupos">Lista de Áreas</label>
                                <div class="table-responsive" style="height: 25rem;">
                                    @foreach ($groups as $group)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="group_{{$group->id}}"  value="{{$group->id}}"
                                                name="group[]" wire:model="group"
                                            >
                                            <label class="custom-control-label"
                                                for="group_{{ $group->id }}">
                                                {{ $group->id }}
                                                -
                                                {{ $group->name }}
                                                <em>( {{ $group->description }} )</em>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    <label class="btn btn-light border" value="reset" wire:click="limpia()">Limpiar</label>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-success" wire:click.prevent="update()">Actualizar Departamento</button>
            </div>
        </div>
    </div>
</div>

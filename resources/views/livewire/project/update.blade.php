<div wire:ignore.self class="modal fade" id="updateProject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateProjectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateProjectModal">MODIFICAR PROYECTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label class="text-muted" for="temporary">Imagen:</label>
                                <input type="file" name="temporary" class="form-control-file @error('temporary') is-invalid @enderror"
                                        wire:model="temporary" wire:dirty.class="bg-success" accept="image/png,image/jpeg,">
                                @error('temporary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            @if ($temporary)
                                <label class="text-muted" for="name">Vista previa:</label>
                                <div>
                                    <img class="img-fluid" alt="archivo" src="{{ $temporary->temporaryUrl() }}">
                                </div>
                            @else
                                <label class="text-muted" for="name">Vista previa:</label>
                                <div>
                                    <img class="img-fluid" src="{{ asset('storage/projects/' . $avatar) }}" alt="Imagen">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="key">Clave:</label>
                        <input type="text" name="key" wire:dirty.class="bg-success"
                            class="form-control @error('key') is-invalid @enderror" wire:model="key">
                        @error('key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                    <div class="form-group">
                        <label class="text-muted" for="responsable">Responsable:</label>
                        <select wire:model="responsable" class="form-control @error('responsable') is-invalid @enderror"  name="responsable" wire:dirty.class="bg-success">
                            <option value="">--Seleccione el Responsable--</option>
                            @foreach($usuarios as $usuario)
                                <option  value="{{ $usuario->name }}"
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
                        @error('responsable')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="clas_id">Clase:</label>
                        <select wire:model="clas_id" class="form-control @error('clas_id') is-invalid @enderror" name="clas_id" wire:dirty.class="bg-success">
                            <option value="">--Seleccione la clase--</option>
                            @foreach($clases as $clase)
                                <option  value="{{ $clase->id }}"
                                    @isset( $clase->description )
                                        @if( $clase->description )
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $clase->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('clas_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="category_id">Categoría:</label>
                        <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror"  name="category_id" wire:dirty.class="bg-success">
                            <option value="">--Seleccione la categoría--</option>
                            @foreach($categorias as $categoria)
                                <option  value="{{ $categoria->id }}"
                                    @isset( $categoria->description )
                                        @if( $categoria->description )
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $categoria->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted text-uppercase" for="user">Lista de Usuarios</label>
                        <div>
                            @foreach ($usuarios as $usuario)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="user_{{$usuario->id}}"  value="{{$usuario->id}}"
                                        name="user[]" wire:model="user"
                                    >
                                    <label class="custom-control-label"
                                        for="user_{{ $usuario->id }}">
                                        {{ $usuario->id }}
                                        -
                                        {{ $usuario->nameUser }} {{ $usuario->firstLastname }} {{ $usuario->secondLastname }}
                                        <em>( {{ $usuario->name }} )</em>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            <label class="btn btn-light" value="reset" wire:click="limpia()">Limpiar</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-success" wire:click.prevent="update()">Actualizar Proyecto</button>
            </div>
        </div>
    </div>
</div>

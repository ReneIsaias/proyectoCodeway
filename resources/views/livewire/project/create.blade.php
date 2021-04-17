<div wire:ignore.self class="modal fade" id="createProject" data-backdrop="static" role="document" data-keyboard="false" tabindex="-1" aria-labelledby="createProjectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createProjectModal">AGREGAR PROYECTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-muted" for="temporary">Imagen:</label>
                                <input type="file" name="temporary" class="form-control-file @error('temporary') is-invalid @enderror"
                                        wire:model="temporary" wire:dirty.class="bg-primary" accept="image/png,image/jpeg,">
                                @error('temporary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if ($temporary)
                                <label class="text-muted" for="name">Vista previa:</label>
                                <div>
                                    <img class="img-fluid" alt="archivo" src="{{ $temporary->temporaryUrl() }}">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="key">Clave:</label>
                        <input type="text" name="key" class="form-control @error('key') is-invalid @enderror"
                                wire:model="key" wire:dirty.class="bg-primary">
                        @error('key')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                        <div class="row">
                            <div class="col-11">
                                <select wire:model="clas_id" class="form-control @error('clas_id') is-invalid @enderror" name="clas_id" wire:dirty.class="bg-primary">
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
                            @can('haveaccess', 'class.create')
                                <div class="col-1">
                                    <button wire:model="addClass" type="button" wire:click.prevent="addClass()" class="btn btn-light">+</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                    @if($addClass)
                        <div class="card-footer">
                            <div class="form-group">
                                <label class="text-muted" for="claseNew">Clase:</label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" name="claseNew" class="form-control @error('claseNew') is-invalid @enderror" wire:model="claseNew" wire:dirty.class="bg-primary">
                                        @error('claseNew')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-1 mx-4">
                                        <button wire:click.prevent="storeClass()" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                    <div class="col-1">
                                        <button wire:click.prevent="cancelaClass()" class="btn btn-secondary btn-sm">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="text-muted" for="category_id">Categoría:</label>
                        <div class="row">
                            <div class="col-11">
                                <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror"  name="category_id" wire:dirty.class="bg-primary">
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
                            @can('haveaccess', 'category.create')
                                <div class="col-1">
                                    <button wire:model="addCategory" type="button" wire:click.prevent="addCategory()" class="btn btn-light">+</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                    @if($addCategory)
                        <div class="card-footer">
                            <div class="form-group">
                                <label class="text-muted" for="categoriaNew">Categoría:</label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" name="categoriaNew" class="form-control @error('categoriaNew') is-invalid @enderror" wire:model="categoriaNew" wire:dirty.class="bg-primary">
                                        @error('categoriaNew')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-1 mx-4">
                                        <button wire:click.prevent="storeCategory()" class="btn btn-primary btn-sm">Agregar</button>
                                    </div>
                                    <div class="col-1">
                                        <button wire:click.prevent="cancelaCategory()" class="btn btn-secondary btn-sm">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="text-muted text-uppercase" for="user">Lista de usuarios</label>
                        <div>
                            @forelse ($usuarios as $usuario )
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="user_{{ $usuario->id }}" wire:model="user"
                                        value="{{ $usuario->id }}"
                                        @if(is_array(old('user')) && in_array("$usuario->id", old('user')))
                                            checked
                                        @endif
                                    >
                                    <label class="custom-control-label"
                                        for="user_{{ $usuario->id }}">
                                        {{ $usuario->id }}
                                        -
                                        {{ $usuario->nameUser }} {{ $usuario->firstLastname }} {{ $usuario->secondLastname }}
                                        <em>( {{ $usuario->name }} )</em>
                                    </label>
                                </div>
                            @empty
                                <li>No hay usuarios </li>
                            @endforelse
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
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Proyecto</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="createUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createUserModal">AGREGAR USUARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="text-muted" for="nameUser">Nombre:</label>
                                <input type="text" name="nameUser" class="form-control @error('nameUser') is-invalid @enderror" wire:model="nameUser" wire:dirty.class="bg-primary">
                                @error('nameUser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="text-muted" for="firstLastname">Primer Apellido:</label>
                                <input type="text" name="firstLastname" class="form-control @error('firstLastname') is-invalid @enderror" wire:model="firstLastname" wire:dirty.class="bg-primary">
                                @error('firstLastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group">
                                <label class="text-muted" for="secondLastname">Segundo Apellido:</label>
                                <input type="text" name="secondLastname" class="form-control @error('secondLastname') is-invalid @enderror" wire:model="secondLastname" wire:dirty.class="bg-primary">
                                @error('secondLastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="text-muted" for="phone">Teléfono:</label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" wire:model="phone" wire:dirty.class="bg-primary">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="text-muted" for="name">Nombre de Usuario:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model="name" wire:dirty.class="bg-primary">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="text-muted" for="email">Email Corporativo:</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" wire:dirty.class="bg-primary">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="text-muted" for="corporative">Email:</label>
                                <input type="email" name="corporative" class="form-control @error('corporative') is-invalid @enderror" wire:model="corporative" wire:dirty.class="bg-primary">
                                @error('corporative')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="password">Contraseña:</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" wire:dirty.class="bg-primary">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="role">Rol:</label>
                        <select wire:model="role" class="form-control @error('role') is-invalid @enderror" name="role" wire:dirty.class="bg-primary" id="role">
                            <option value="">--Seleccione el rol--</option>
                            @foreach($roless as $role)
                            <option value="{{$role->id}}">
                                {{ $role->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="departament">Departamento:</label>
                        <div class="row">
                            <div class="col-11">
                                <select wire:model="departament" class="form-control @error('departament') is-invalid @enderror" name="departament" wire:dirty.class="bg-primary" id="departament">
                                    <option value="">--Seleccione el departamento--</option>
                                    @foreach($departamentss as $departament)
                                    <option value="{{$departament->id}}">
                                        {{ $departament->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('departament')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @can('haveaccess', 'departament.create')
                                <div class="col-1">
                                    <button wire:model="addDepartament" type="button" wire:click.prevent="addDepartament()" class="btn btn-light">+</button>
                                </div>
                            @endcan
                        </div>
                    </div>
                    @if($addDepartament)
                    <div class="card-footer">
                        <div class="form-group">
                            <label class="text-muted" for="nameDepa">Departamento:</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" name="nameDepa" class="form-control @error('nameDepa') is-invalid @enderror" wire:model="nameDepa" wire:dirty.class="bg-primary">
                                    @error('nameDepa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-1 mx-4">
                                    <button wire:click.prevent="storeDepa()" class="btn btn-primary btn-sm">Agregar</button>
                                </div>
                                <div class="col-1">
                                    <button wire:click.prevent="cacelaDepa()" class="btn btn-secondary btn-sm">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @isset ($depa)
                    <div class="form-group">
                        <label class="text-muted" for="group">Área:</label>
                        <div class="row">
                            <div class="col-11">
                                <select wire:model="group" class="form-control @error('group') is-invalid @enderror" name="group" wire:dirty.class="bg-primary" id="group">
                                    <option value="">--Seleccione el área--</option>
                                    @isset($grupos)
                                    @forelse($grupos->groups as $group)
                                    <option value="{{$group->id}}">
                                        {{ $group->name }}
                                    </option>
                                    @empty
                                    <option value="">
                                        no hay áreas en este departamento
                                    </option>
                                    @endforelse
                                    @endisset
                                </select>
                                @error('group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-1">
                                @can('haveaccess', 'group.create')
                                <button wire:model="addArea" type="button" wire:click.prevent="addArea()" class="btn btn-light">+</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @if($addArea)
                    <div class="card-footer">
                        <div class="form-group">
                            <label class="text-muted" for="nameArea">Área :</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" name="nameArea" class="form-control @error('nameArea') is-invalid @enderror" wire:model="nameArea" wire:dirty.class="bg-primary">
                                    @error('nameArea')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-1 mx-4">
                                    <button wire:click.prevent="storeArea()" class="btn btn-primary btn-sm">Agregar</button>
                                </div>
                                <div class="col-1">
                                    <button wire:click.prevent="cacelaArea()" class="btn btn-secondary btn-sm">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endisset
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Usuario</button>
                </div>
            </div>
        </div>
    </div>
</div>

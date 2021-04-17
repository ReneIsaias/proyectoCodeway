<div wire:ignore.self class="modal fade" id="updateUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="updateUsuarioModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateUsuarioModal">MODIFICAR USUARIO</h5>
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
                                <input type="text" name="nameUser"
                                    class="form-control @error('nameUser') is-invalid @enderror" wire:model="nameUser"
                                    wire:dirty.class="bg-success">
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
                                <input type="text" name="firstLastname"
                                    class="form-control @error('firstLastname') is-invalid @enderror"
                                    wire:model="firstLastname" wire:dirty.class="bg-success">
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
                                <input type="text" name="secondLastname"
                                    class="form-control @error('secondLastname') is-invalid @enderror"
                                    wire:model="secondLastname" wire:dirty.class="bg-success">
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
                                <input type="number" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" wire:model="phone"
                                    wire:dirty.class="bg-success">
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
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" wire:dirty.class="bg-success">
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
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" wire:model="email"
                                    wire:dirty.class="bg-success">
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
                                <input type="email" name="corporative"
                                    class="form-control @error('corporative') is-invalid @enderror"
                                    wire:model="corporative" wire:dirty.class="bg-success">
                                @error('corporative')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @can('haveaccess', 'user.password')
                        <div class="form-group">
                            <label class="text-muted" for="password">Nueva contraseña:</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" wire:model="password"
                                wire:dirty.class="bg-success" minlength="8">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endcan
                    <div class="form-group">
                        <label class="text-muted" for="color">Estado:</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="statusType1" wire:model="status" name="status"
                                class="custom-control-input" value="1" @if ($status == '1') checked @endif>
                            <label class="custom-control-label" for="statusType1">Activo</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="statusType0" wire:model="status" name="status"
                                class="custom-control-input" value="0" @if ($status == '0') checked @endif>
                            <label class="custom-control-label" for="statusType0">Inactivo</label>
                            <hr>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="role">Rol:</label>
                        <select wire:model="role" class="form-control @error('role') is-invalid @enderror" name="role"
                            wire:dirty.class="bg-success">
                            <option value="">--Seleccione el rol--</option>
                            @foreach ($roless as $rol)
                                <option value="{{ $rol->id }}" @isset($rol->name)
                                        @if ($rol->name)
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $rol->name }}
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
                        <select wire:model="departament" class="form-control @error('departament') is-invalid @enderror"
                            name="departament" wire:dirty.class="bg-success">
                            <option value="">--Seleccione el departamento--</option>
                            @foreach ($departamentss as $departamento)
                                <option value="{{ $departamento->id }}" @isset($departamento->name)
                                        @if ($departamento->name)
                                            selected
                                        @endif
                                    @endisset
                                    >
                                    {{ $departamento->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('departament')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @isset($depa)
                        <div class="form-group">
                            <label class="text-muted" for="group">Área:</label>
                            <select wire:model="group" class="form-control @error('group') is-invalid @enderror"
                                name="group" wire:dirty.class="bg-success">
                                <option value="">--Seleccione el área--</option>
                                @isset($grupos)
                                    @foreach ($grupos->groups as $group)
                                        <option value="{{ $group->id }}" @isset($group->name)
                                                @if ($group->name)
                                                    selected
                                                @endif
                                            @endisset
                                            >
                                            {{ $group->name }}
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endisset
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-success" wire:click.prevent="update()">Actualizar Usuario</button>
            </div>
        </div>
    </div>
</div>

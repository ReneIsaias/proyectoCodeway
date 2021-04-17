<div>
    <div wire:ignore.self class="row">
        <div class="container col-lg-4 col-md-4">
            <h4 class="text-muted">Imagen de perfil</h4>
            <h5 class="text-muted">Actualice su imagen de perfil</h5>
            <h5 class="text-muted">Agregue una descripción de quien es usted</h5>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="container card">
                <div class="card-body">
                    <div class="col-lg-11 col-md-10 ">
                        @if($temporary)
                            <div class="col-lg-5">
                                <label class="text-muted" for="name">Avatar</label>
                                <div>
                                    <img class="img-fluid" alt="usuario" src="{{ $temporary->temporaryUrl() }}">
                                </div>
                                <div wire:loading wire:target="temporary">Cargando...</div>
                            </div>
                        @else
                            <div class="col-lg-5">
                                <label class="text-muted" for="name">Avatar</label>
                                <div>
                                    <img class="img-fluid" alt="usuario" src="{{ asset($avatar) }}">
                                </div>
                                <div wire:loading wire:target="avatar">Cargando...</div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="text-muted" for="temporary">Cambiar avatar</label>
                            <input type="file" name="temporary" class="form-control-file @error('temporary') is-invalid @enderror"
                                    wire:model="temporary" wire:dirty.class="bg-success" accept="image/png,image/jpeg,">
                            @error('temporary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="name">Nombre de usuario:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" wire:dirty.class="bg-success" disabled>
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
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <button class="btn btn-info btn-block" wire:click.prevent="saveAvatar()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div wire:ignore.self class="row">
        <div class="container col-lg-4 col-md-4">
            <h4 class="text-muted">Información de perfil</h4>
            <h5 class="text-muted">Actualice la información de su perfil</h5>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="container card">
                <div class="card-body">
                    <div class="col-lg-11 col-md-10">
                        <div class="form-group">
                            <label class="text-muted" for="nameUser">Nombre:</label>
                            <input type="text" name="nameUser" class="form-control @error('nameUser') is-invalid @enderror"
                                    wire:model="nameUser" wire:dirty.class="bg-success">
                            @error('nameUser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="firstLastname">Primer Apellido:</label>
                            <input type="text" name="firstLastname" class="form-control @error('firstLastname') is-invalid @enderror"
                                    wire:model="firstLastname" wire:dirty.class="bg-success">
                            @error('firstLastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="secondLastname">Segundo Apellido:</label>
                            <input type="text" name="secondLastname" class="form-control @error('secondLastname') is-invalid @enderror"
                                    wire:model="secondLastname" wire:dirty.class="bg-success">
                            @error('secondLastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="phone">Teléfono:</label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    wire:model="phone" wire:dirty.class="bg-success">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="email">Email:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    wire:model="email" wire:dirty.class="bg-success">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="corporative">Email Corporativo:</label>
                            <input type="email" name="corporative" class="form-control @error('corporative') is-invalid @enderror"
                                    wire:model="corporative" wire:dirty.class="bg-success">
                            @error('corporative')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <button class="btn btn-info btn-block" wire:click.prevent="saveUser()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div wire:ignore.self class="row">
        <div class="container col-lg-4 col-md-4">
            <h4 class="text-muted">Información de datos personales y sus redes sociales</h4>
            <h5 class="text-muted">Actualice la información de su cuenta</h5>
            <h5 class="text-muted">Actualice la información personal</h5>
            <h5 class="text-muted">Agregue sus redes sociales que utiliza</h5>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="container card">
                <div class="card-body">
                    <div class="col-lg-11 col-md-10">
                        <div class="form-group">
                            <label class="text-muted" for="birthday">Fecha de nacimiento:</label>
                            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror"
                                    wire:model="birthday" wire:dirty.class="bg-success">
                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="facebook">Facebook:</label>
                            <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror"
                                    wire:model="facebook" wire:dirty.class="bg-success">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="instagram">Instagram:</label>
                            <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
                                    wire:model="instagram" wire:dirty.class="bg-success">
                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="github">Github:</label>
                            <input type="text" name="github" class="form-control @error('github') is-invalid @enderror"
                                    wire:model="github" wire:dirty.class="bg-success">
                            @error('github')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="website">Sitio web:</label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror"
                                    wire:model="website" wire:dirty.class="bg-success">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="other">Otra red social:</label>
                            <input type="text" name="other" class="form-control @error('other') is-invalid @enderror"
                                    wire:model="other" wire:dirty.class="bg-success">
                            @error('other')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <button class="btn btn-info btn-block" wire:click.prevent="saveProfile()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div wire:ignore.self class="row">
        <div class="container col-lg-4 col-md-4">
            <h4 class="text-muted">Actualice su contraseña</h4>
            <h5 class="text-muted">Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro</h5>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="container card">
                <div class="card-body">
                    <div class="col-lg-11 col-md-10">
                        <div class="form-group">
                            <label class="text-muted" for="password">Contraseña Actual:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                    wire:model="password" wire:dirty.class="bg-success">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="password1">Nueva Contraseña:</label>
                            <input type="password" name="password1" class="form-control @error('password1') is-invalid @enderror"
                                    wire:model="password1" wire:dirty.class="bg-success">
                            @error('password1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-muted" for="password1_confirmation">Confirmar Contraseña:</label>
                            <input type="password" name="password1_confirmation" class="form-control @error('password1_confirmation') is-invalid @enderror"
                                    wire:model="password1_confirmation" wire:dirty.class="bg-success">
                            @error('password1_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <button class="btn btn-info btn-block" wire:click.prevent="savePassword()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('haveaccess', 'profile.update')
        <hr>
        <div wire:ignore.self class="row">
            <div class="container col-lg-4 col-md-4">
                <h4 class="text-muted">Desactivar cuenta</h4>
                <h5 class="text-muted">Mantendrá tu cuenta inactiva</h5>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="container card">
                    <div class="card-body">
                        <div class="col-lg-11 col-md-10">
                            <div class="form-group">
                                <label class="text-muted" for="color">Estado:</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="statusType1" wire:model="status" name="status" class="custom-control-input" value="1"
                                        @if ( $status == "1" )
                                            checked
                                        @endif
                                    >
                                    <label class="custom-control-label text-muted" for="statusType1">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="statusType0" wire:model="status" name="status" class="custom-control-input" value="0"
                                        @if ( $status == "0" )
                                            checked
                                        @endif
                                    >
                                    <label class="custom-control-label text-muted" for="statusType0">Inactivo</label>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-lg-3 col-md-4 col-sm-4">
                            <button class="btn btn-info btn-block" wire:click.prevent="saveEstado()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endcan
    @include('custom.message')
</div>

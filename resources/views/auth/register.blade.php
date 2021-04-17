{{-- @extends('layouts.auth')

@section('title', 'Register_no_fount')

@section('content')
<div class="login-logo mt-5">
    <a href="/"><strong>Codeway Soluciones Integrales</strong></a>
</div>
<div class="row">
    <div class="col-5">
        <img class="justify-content-start" src="{{ asset('favicons/apple-icon-180x180.png') }}" alt="logo_codeway_register">
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-body login-card-body">
                <form action="{{ route('register') }}" method="POST">

                    <label class="text-muted" for="description">Nombre completo :</label>
                    <div class="input-group mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="text-muted" for="description">Correo electronico :</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="text-muted" for="description">Contraseña :</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required minlength="8">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="text-muted" for="description">Confirmar contraseña :</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required minlength="8">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-none">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}


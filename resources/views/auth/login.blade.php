@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/"><strong>Codeway Soluciones Integrales</strong></a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form action="{{ route('login') }}" method="POST">

                <label class="text-muted" for="email">Correo electronico :</label>
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electronico" required>
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

                <label class="text-muted" for="password">Contraseña :</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required minlength="8">
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

                <div class="d-none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Recordarme</label>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('password.email') }}">¿No recuerdo mi contraseña?</a>
        </div>
    </div>
</div>
@endsection

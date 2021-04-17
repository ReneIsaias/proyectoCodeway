@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="/"><strong>Recuperación de contraseña</strong></a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <div class="card">
        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('password.email') }}">

                <label class="text-muted" for="description">Correo electronico :</label>
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo electronico" required="required">
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

                <div class="d-none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Recuperar contraseña</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('login') }}">Acceder</a>
        </div>
    </div>
</div>
@endsection

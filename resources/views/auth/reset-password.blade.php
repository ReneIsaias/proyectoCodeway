@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/"><strong>Cambiar contraseña</strong></a>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <div class="card">
        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('password.update') }}">
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $request->email ?? old('email') }}" autocomplete="email"  placeholder="Email" required="required">
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
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="New Password" required="required">
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
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm New Password" required="required">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="d-none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
            </form>
        </div>
    </div>
</div>
@endsection

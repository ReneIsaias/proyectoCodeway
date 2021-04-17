{{-- Extendemos del layout principal --}}
@extends('layouts.app')

{{-- Le asignamos en sufijo al titlo de la pagina --}}
@section('title_postfix', 'Home')

{{-- Agregamos un header arriba del contente --}}
@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
            </h3>
        </div>
    </div>
@endsection

{{-- En esta section va nuestro content --}}
@section('content')

    <div>
        @livewire('user.events-component')

        @livewire('profile.miprojects-component')
    </div>

@stop


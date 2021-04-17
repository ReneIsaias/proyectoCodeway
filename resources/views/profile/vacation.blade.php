@extends('layouts.app')

@section('title_postfix', 'Mis Vacaciones')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-plane-departure" rel="icon">
                <a class="text-uppercase" href="{{ route('myvacation') }}">Mis Vacaciones</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('profile.myvacation-component')
    </div>
@endsection

@section('js')
    <script>
        /* window.livewire.on('eventCreatedEvent', ()=>{
            $('#createEvent').modal('hide');
        })

        window.livewire.on('eventUpdatedEvent', ()=>{
            $('#updateEvent').modal('hide');
        }) */
    </script>
@endsection

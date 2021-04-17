@extends('layouts.app')

@section('title_postfix', 'Usuarios')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-users" rel="icon">
                <a class="text-uppercase" href="{{ route('user.index') }}">Usuarios</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('user.user-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('userCreatedEvent', ()=>{
            $('#createUser').modal('hide');
        });

        window.livewire.on('userUpdatedEvent', ()=>{
            $('#updateUser').modal('hide');
        });

        window.livewire.on('userShowEvent', ()=>{
            $('#showUser').modal('hide');
        });

        window.livewire.on('userDeletedEvent', ()=>{
            $('#deleteUser').modal('hide');
        });
    </script>
@endsection

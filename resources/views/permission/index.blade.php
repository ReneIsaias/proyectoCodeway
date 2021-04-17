@extends('layouts.app')

@section('title_postfix', 'Permisos')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-user-lock" rel="icon">
                <a class="text-uppercase" href="{{ route('permission.index') }}">Permisos</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('permission.permission-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('permissionCreatedEvent', ()=>{
            $('#createPermission').modal('hide');
        })

        window.livewire.on('permissionUpdatedEvent', ()=>{
            $('#updatePermission').modal('hide');
        })

        window.livewire.on('permissionShowEvent', ()=>{
            $('#showPermission').modal('hide');
        })

        window.livewire.on('permissionDeletedEvent', ()=>{
            $('#deletePermission').modal('hide');
        })
    </script>
@endsection

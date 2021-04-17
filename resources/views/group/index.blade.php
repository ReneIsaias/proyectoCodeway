@extends('layouts.app')

@section('title_postfix', 'Áreas')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-user-friends" rel="icon">
                <a class="text-uppercase" href="{{ route('group.index') }}">Áreas</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('group.group-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('groupCreatedEvent', ()=>{
            $('#createGroup').modal('hide');
        })

        window.livewire.on('groupUpdatedEvent', ()=>{
            $('#updateGroup').modal('hide');
        })

        window.livewire.on('groupShowEvent', ()=>{
            $('#showGroup').modal('hide');
        })

        window.livewire.on('groupDeletedEvent', ()=>{
            $('#deleteGroup').modal('hide');
        })
    </script>
@endsection

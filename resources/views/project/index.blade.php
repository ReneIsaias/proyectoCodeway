@extends('layouts.app')

@section('title_postfix', 'Proyectos')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-project-diagram" rel="icon">
                <a class="text-uppercase" href="{{ route('project.index') }}">Proyectos</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('project.project-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('projectCreatedEvent', ()=>{
            $('#createProject').modal('hide');
        })

        window.livewire.on('projectUpdatedEvent', ()=>{
            $('#updateProject').modal('hide');
        })

        window.livewire.on('projectShowEvent', ()=>{
            $('#showProject').modal('hide');
        })

        window.livewire.on('projectDeletedEvent', ()=>{
            $('#deleteProject').modal('hide');
        })
    </script>
@endsection

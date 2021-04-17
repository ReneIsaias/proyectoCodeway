@extends('layouts.app')

@section('title_postfix', 'Mis Proyectos')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <img width="3%" class="img-circule" src="{{ asset('storage/projects/' . $project->avatar) }}" alt="{{ $project->avatar }}">
                <a class="text-uppercase" href="{{ route('project.show', $project->id) }}">{{ $project->name}}</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')

    <div>
        @livewire('profile.mytask-component', ['project' => $project])
    </div>

@endsection

@section('js')
    <script>
        window.livewire.on('taskCreatedEvent', ()=>{
            $('#createTask').modal('hide');
        })

        window.livewire.on('taskUpdatedEvent', ()=>{
            $('#updateTask').modal('hide');
        })
    </script>
@endsection

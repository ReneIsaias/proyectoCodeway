@extends('layouts.app')

@section('title_postfix', 'Tareas')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-tasks" rel="icon">
                <a class="text-uppercase" href="{{ route('task.index') }}">Tareas</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('task.task-component')
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

        window.livewire.on('taskShowEvent', ()=>{
            $('#showTask').modal('hide');
        })

        window.livewire.on('taskDeletedEvent', ()=>{
            $('#deleteTask').modal('hide');
        })
    </script>
@endsection

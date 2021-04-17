@extends('layouts.app')

@section('title_postfix', 'Prioridades')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-list-ol" rel="icon">
                <a class="text-uppercase" href="{{ route('priority.index') }}">Prioridades</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('priority.priority-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('priorityCreatedEvent', ()=>{
            $('#createPriority').modal('hide');
        })

        window.livewire.on('priorityUpdatedEvent', ()=>{
            $('#updatePriority').modal('hide');
        })

        window.livewire.on('priorityShowEvent', ()=>{
            $('#showPriority').modal('hide');
        })

        window.livewire.on('priorityDeletedEvent', ()=>{
            $('#deletePriority').modal('hide');
        })
    </script>
@endsection

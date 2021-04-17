@extends('layouts.app')

@section('title_postfix', 'Ausencias')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-user-slash" rel="icon">
                <a class="text-uppercase" href="{{ route('absence.index') }}">Ausencias</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('absence.absence-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('absenceCreatedEvent', ()=>{
            $('#createAbsence').modal('hide');
        })

        window.livewire.on('absenceUpdatedEvent', ()=>{
            $('#updateAbsence').modal('hide');
        })

        window.livewire.on('absenceShowEvent', ()=>{
            $('#showAbsence').modal('hide');
        })

        window.livewire.on('absenceDeletedEvent', ()=>{
            $('#deleteAbsence').modal('hide');
        })
    </script>
@endsection

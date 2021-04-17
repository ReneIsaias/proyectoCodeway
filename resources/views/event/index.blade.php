@extends('layouts.app')

@section('title_postfix', 'Eventos')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-calendar-check" rel="icon">
                <a class="text-uppercase" href="{{ route('event.index') }}">Eventos</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('event.event-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('eventCreatedEvent', ()=>{
            $('#createEvent').modal('hide');
        })

        window.livewire.on('eventUpdatedEvent', ()=>{
            $('#updateEvent').modal('hide');
        })

        window.livewire.on('eventShowEvent', ()=>{
            $('#showEvent').modal('hide');
        })

        window.livewire.on('eventDeletedEvent', ()=>{
            $('#deleteEvent').modal('hide');
        })
    </script>
@endsection

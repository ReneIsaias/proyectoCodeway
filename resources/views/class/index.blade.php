@extends('layouts.app')

@section('title_postfix', 'Clases')

@section('content_header')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-layer-group" rel="icon">
                <a class="text-uppercase" href="{{ route('class.index') }}">Clases</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('clase.clase-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('classCreatedEvent', ()=>{
            $('#createClass').modal('hide');
        })

        window.livewire.on('classUpdatedEvent', ()=>{
            $('#updateClass').modal('hide');
        })

        window.livewire.on('classShowEvent', ()=>{
            $('#showClass').modal('hide');
        })

        window.livewire.on('classDeletedEvent', ()=>{
            $('#deleteClass').modal('hide');
        })
    </script>
@endsection

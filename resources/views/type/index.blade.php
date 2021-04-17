@extends('layouts.app')

@section('title_postfix', 'Tipos')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-crop-alt" rel="icon">
                <a class="text-uppercase" href="{{ route('type.index') }}">Tipos</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('type.type-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('typesCreatedEvent', ()=>{
            $('#createType').modal('hide');
        })

        window.livewire.on('typesUpdatedEvent', ()=>{
            $('#updateType').modal('hide');
        })

        window.livewire.on('typesShowEvent', ()=>{
            $('#showType').modal('hide');
        })

        window.livewire.on('typesDeletedEvent', ()=>{
            $('#deleteType').modal('hide');
        })
    </script>
@endsection

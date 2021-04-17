@extends('layouts.app')

@section('title_postfix', 'Departamentos')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-building" rel="icon">
                <a class="text-uppercase" href="{{ route('departament.index') }}">Departamentos</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('departament.departament-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('departamentCreatedEvent', ()=>{
            $('#createDepartament').modal('hide');
        })

        window.livewire.on('departamentUpdatedEvent', ()=>{
            $('#updateDepartament').modal('hide');
        })

        window.livewire.on('departamentShowEvent', ()=>{
            $('#showDepartament').modal('hide');
        })

        window.livewire.on('departamentDeletedEvent', ()=>{
            $('#deleteDepartament').modal('hide');
        })
    </script>
@endsection

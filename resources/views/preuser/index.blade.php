@extends('layouts.app')

@section('title_postfix', 'Aspirantes')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-portrait" rel="icon">
                <a class="text-uppercase" href="{{ route('preuser.index') }}">Aspirantes</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('preuser.preuser-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('preuserCreatedEvent', ()=>{
            $('#createPreuser').modal('hide');
        })

        window.livewire.on('preuserUpdatedEvent', ()=>{
            $('#updatePreuser').modal('hide');
        })

        window.livewire.on('preuserShowEvent', ()=>{
            $('#showPreuser').modal('hide');
        })

        window.livewire.on('preuserDeletedEvent', ()=>{
            $('#deletePreuser').modal('hide');
        })
    </script>
@endsection

@extends('layouts.app')

@section('title_postfix', 'Vacantes')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-clipboard" rel="icon">
                <a class="text-uppercase" href="{{ route('vacant.index') }}">Vacantes</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('vacant.vacant-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('vacantCreatedEvent', ()=>{
            $('#createVacant').modal('hide');
        })

        window.livewire.on('vacantUpdatedEvent', ()=>{
            $('#updateVacant').modal('hide');
        })

        window.livewire.on('vacantShowEvent', ()=>{
            $('#showVacant').modal('hide');
        })

        window.livewire.on('vacantDeletedEvent', ()=>{
            $('#deleteVacant').modal('hide');
        })
    </script>
@endsection

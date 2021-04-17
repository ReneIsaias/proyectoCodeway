@extends('layouts.app')

@section('title_postfix', 'Vacaciones')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-plane-departure" rel="icon">
                <a class="text-uppercase" href="{{ route('holiday.index') }}">Vacaciones</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('holiday.holiday-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('holidayCreatedEvent', ()=>{
            $('#createHoliday').modal('hide');
        })

        window.livewire.on('holidayUpdatedEvent', ()=>{
            $('#updateHoliday').modal('hide');
        })

        window.livewire.on('holidayShowEvent', ()=>{
            $('#showHoliday').modal('hide');
        })

        window.livewire.on('holidayDeletedEvent', ()=>{
            $('#deleteHoliday').modal('hide');
        })
    </script>
@endsection

@extends('layouts.app')

@section('title_postfix', 'Categorías')

@section('content_header')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">
                <link class="fas fa-fw fa-home" rel="icon">
                <a class="text-uppercase" href="{{ route('home') }}">Codeway</a>
                /
                <link class="fas fa-fw fa-boxes" rel="icon">
                <a class="text-uppercase" href="{{ route('category.index') }}">Categorías</a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div>
        @livewire('category.category-component')
    </div>
@endsection

@section('js')
    <script>
        window.livewire.on('categoryCreatedEvent', ()=>{
            $('#createCategory').modal('hide');
        })

        window.livewire.on('categoryUpdatedEvent', ()=>{
            $('#updateCategory').modal('hide');
        })

        window.livewire.on('categoryShowEvent', ()=>{
            $('#showCategory').modal('hide');
        })

        window.livewire.on('categoryDeletedEvent', ()=>{
            $('#deleteCategory').modal('hide');
        })
    </script>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'Codeway') }}
    </title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @livewireStyles
</head>
    <div class="container">

        @livewire('vacant.create-component');

        @livewireScripts

        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            window.livewire.on('preuserCreatedEvent', ()=>{
                $('#createPreuser').modal('hide');
            })
        </script>
    </div>
</html>

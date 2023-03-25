<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
{{--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
        @livewireStyles
    </head>
        <!-- Styles -->
        <style>
            @livewireStyles
        </style>
    </head>
    <body>
         <div class="container">
             <div class="w-10/12 mx-auto mt-10 shadow-sm p-2">
{{--                <livewire:contacts-manager/>--}}
                 @livewire('category-form')
             </div>
{{--            <livewire:counter />--}}

{{--            @livewire('form1')--}}
        </div>
    @livewireScripts
    </body>
</html>

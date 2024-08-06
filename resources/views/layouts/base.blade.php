<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <title>DeBoer Building LLC</title>

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans flex flex-col">

@yield('content')

@vite('resources/js/app.js')
@livewireScripts
</body>
</html>

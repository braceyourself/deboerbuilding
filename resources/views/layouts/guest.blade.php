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

<div x-data class="flex flex-col justify-between min-h-screen font-sans antialiased max-w-screen overflow-x-hidden"
     style="font-family: Serif,serif">

    <x-guest.header x-ref="header"/>

    <div
            {{ $attributes->merge(['class' => 'flex-grow']) }}
            :style="{marginTop: $refs.header.clientHeight + 'px'}"
    >
        @yield('content')
    </div>

    <x-guest.footer/>
</div>

@vite('resources/js/app.js')
@livewireScripts
</body>
</html>

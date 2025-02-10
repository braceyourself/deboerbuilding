<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <title>DeBoer Building LLC</title>

    <style>
        :root {
            @foreach(\App\Models\Setting::whereName('theme')->first()->value as $color => $theme)
                @if($colors = data_get($theme, 'colors'))
                    --{{ $color }}: {{ data_get($theme, 'seed.hex.value') }};
                    @foreach($colors as $i => $data)
                        @php
                            $shade = ($i + 1) * 100;
                            if($shade > 900){
                                $shade = 950;
                            }
                        @endphp
                    --{{ $color }}-{{ $shade }}: {{ data_get($data, 'hex.value') }};
                    @endforeach
                @endif
            @endforeach
        }
    </style>

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans flex flex-col">

@yield('content')

@vite('resources/js/app.js')
@livewireScripts
</body>
</html>

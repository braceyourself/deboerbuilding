@props([
    'link' => '/',
])

@php
$href = $link === '/' ? '#' : $link;
@endphp

<a href="{{ $href }}" class="self-center">
    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo.png') }}"
         {{ $attributes->merge([
             'alt' => "DeBoer Building LLC",
             'class' => "h-12",
         ]) }}
    >
</a>

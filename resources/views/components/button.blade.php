@props([
    'href' => null
])

@php
    $attributes = $attributes->merge([
        'class' => 'inline-block bg-primary text-white py-2 px-3 rounded hover:bg-secondary  font-bold'
    ]);
@endphp

@isset($href)
    <a href="{{ $href }}" wire:navigate.hover {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes }}>
        {{ $slot }}
    </button>
@endif



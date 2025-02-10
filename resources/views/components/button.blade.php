@props([
    'href' => null
])

@php
    $attributes = $attributes->merge([
        'class' => 'inline-block bg-primary-500 hover:bg-primary-600 dark:text-white py-2 px-3 rounded  font-bold'
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



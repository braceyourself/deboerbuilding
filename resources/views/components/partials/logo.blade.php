@props([
    'center' => false
])
<x-nav-link href="/"
            :exact="true"
            @class([
                'min-w-fit' => true,
                'mx-auto' => $center
            ])
>
    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo.png') }}"
            {{ $attributes->merge([
                'alt' => "DeBoer Building LLC",
                'class' => "h-12",
            ]) }}
    >
</x-nav-link>

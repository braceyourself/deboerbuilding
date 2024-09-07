@props([
    'link' => '/',
])

<a href="{{ $link }}" class="self-center">
    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo.png') }}"
         {{ $attributes->merge([
             'alt' => "DeBoer Building LLC",
             'class' => "h-12",
         ]) }}
    >
</a>

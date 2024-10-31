@props([
    'src',
    'alt' => str($src)->slug()
])

<img src="{{ $src }}"
{{
    $attributes->merge([
        'class' => "rounded-xl border-primary border-2 max-w-lg"
    ])
}}
/>
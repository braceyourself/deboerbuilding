@props([
    'exact' => false,
    'href' => '#',
])

<a {{ $attributes->merge([
    'class' => 'w-min hover:drop-shadow-md drop-shadow-primary-900 hover:underline underline-offset-8 hover:cursor-pointer',
    'href' => $href,
]) }}
   wire:navigate.hover
   wire:current{{ $exact ? '.exact' : ''}}="underline drop-shadow cursor-default disabled hover:cursor-default"
   style="text-decoration-color: var(--primary);"
>
    {{ $slot }}
</a>
<a {{ $attributes }}
   wire:navigate.hover
   wire:current="underline drop-shadow cursor-default disabled"
   class="w-min mx-auto hover:drop-shadow-md drop-shadow-primary-900 hover:underline underline-offset-8"
   style="text-decoration-color: var(--primary);"
>
    {{ $slot }}
</a>
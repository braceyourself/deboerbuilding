@props([
    'service' => null,
    'key' => null,
])


@php
    /** @var \App\Models\Service $service */

        $odd = $key % 2 === 0;
@endphp


<div @class([
    'flex flex-col md:flex-row justify-between gap-5 m-auto ',
    'md:flex-row-reverse' => $odd,
])>

    <div @class([
        'flex w-full flex-col gap-4 justify-center md:justify-between text-center',
        'md:text-left ' => $odd,
        'md:text-right' => !$odd
    ])>
        <div class="text-center md:text-left">
            <div class="text-3xl">
                {{ $service->name }}
            </div>

            <div>
                {!! $service->description ?? ' -- no description -- ' !!}
            </div>
        </div>

        <x-button href="{{ route('services.show', $service) }}" class="text-center">
            Details
        </x-button>

    </div>

    <img src="/storage/{{ $service->image?->path }}"
         alt="{{ str($service->name)->slug() }}"
         style="object-fit: cover"
         class="md:max-w-sm lg:max-w-lg  h-max image-with-border"
    >

</div>
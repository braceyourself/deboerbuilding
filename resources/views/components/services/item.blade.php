@props([
    'service' => null,
    'key' => null,
])


@php
    /** @var \App\Models\Service $service */

        $odd = $key % 2 === 0;
@endphp


<div @class([
    'flex flex-col md:flex-row  justify-around gap-5 m-auto px-10',
    'md:flex-row-reverse' => $odd,
])>

    <div @class([
        'flex w-full flex-col justify-center md:justify-between text-center',
        'md:text-left ' => $odd,
        'md:text-right' => !$odd
    ])>
        <div>
            <div class="text-3xl">
                {{ $service->name }}
            </div>

            <div>
                {{ $service->description ?: $service->short_description }}
            </div>
        </div>

        <a href="/contact?comment=i'd like a quote for {{ $service->name }}" @class([
            'w-fit bg-primary text-white py-3 px-6 rounded-xl hover:bg-primary-400 font-bold sm:mx-auto md:mx-0 my-10',
            'md:ml-auto' => !$odd,
            'md:mr-auto' => $odd,

        ])>
            Ask about {{ $service->name }}
        </a>

    </div>

    <img src="storage/{{ $service->image->path }}"
         alt="{{ str($service->name)->slug() }}"
         class="md:w-1/2 h-1/2 image-with-border w-full"
    >

</div>
@props([
    'service'
])

<div {{ $attributes->merge([
    'class' => 'grow flex flex-col justify-center',
    'style' => "background-image: url('{$service->image_url}'); background-size: cover; text-shadow: 0 0 6px black;",
]) }}>

    <div class="flex flex-col justify-center gap-4 px-8 py-5 text-white text-center relative h-full transition-all ease-in-out duration-100">

        <h3 class="lg:text-3xl font-semibold">{{ $service->name }}</h3>

        <p class="text-xl">{!! $service->short_description !!}</p>

        <x-button href="/services/{{ $service->id }}">Learn more</x-button>

    </div>

</div>


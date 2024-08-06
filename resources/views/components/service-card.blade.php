@props([
    'service'
])

<div {{ $attributes->merge([
    'class' => 'grow flex flex-col justify-center'
]) }}
    x-data="{
        hover: false,
    }"

    style="background-image: url('{{ $service->image_url }}'); background-size: cover; text-shadow: 0 0 6px black;"
>
    <div class="px-8 py-5 text-white text-center relative h-full flex flex-col justify-center transition-all ease-in-out duration-100">
        <div
                @mouseenter="hover = true"
                @mouseleave="hover = false"
        >
            <h3 class="text-3xl lg:text-5xl font-semibold">{{ $service->name }}</h3>
            <p class="mt-2 text-xl">{{ $service->short_description }}</p>
        </div>
    </div>
</div>


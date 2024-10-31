@php /** @var App\Models\Testimonial $testimonial **/ @endphp

@props([
    'testimonial',
    'imagePosition' => 'left',
    'image',
    'maxHeight' => null
])

<div {{ $attributes->merge(['class'=> "flex flex-col justify-between bg-white p-6 rounded shadow w-auto text-md md:text-lg min-w-fit"]) }} >

    <p @class([
        "text-gray-600",
    ]) @style([
        'max-height' => $maxHeight,
        'overflow' => 'hidden',
    ])>"{!! $testimonial->content !!}"</p>

    <p class="text-right mt-2 text-gray-800 text-2xl font-semibold">- {{ $testimonial->client->name }}</p>

</div>


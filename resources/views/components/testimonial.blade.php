@props([
    'testimonial',
    'imagePosition' => 'left',
    'image',
])
@php /** @var App\Models\Testimonial $testimonial **/ @endphp

<div @class([
         "flex flex-col lg:flex-row gap-10 justify-center m-auto",
         "lg:flex-row-reverse" => $imagePosition === 'right',
])>

    @isset($image)
    @if($image instanceof \Illuminate\View\ComponentSlot)
        <div {{ $image->attributes->merge(['class' => 'relative block']) }}>
            {!! $image !!}
        </div>
    @else
        <div class="relative block w-[300px] m-auto">
            <img class="lg:absolute top-0" src="{{ $image }}" alt="">
        </div>
    @endif
    @endisset

    <x-testimonial-card
            :content="$testimonial->content"
            :client-name="$testimonial->client->name"
    />

</div>

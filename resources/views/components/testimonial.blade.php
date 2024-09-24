@props([
    'testimonial',
    'imagePosition' => 'left',
    'image',
])
@php /** @var App\Models\Testimonial $testimonial **/ @endphp

<div @class([
         "flex flex-col lg:flex-row justify-center m-auto",
         "lg:flex-row-reverse" => $imagePosition === 'right',
])>

{{--
    @isset($image)
    @if($image instanceof \Illuminate\View\ComponentSlot)
        <div {{ $image->attributes->merge(['class' => 'relative block']) }}>
            {!! $image !!}
        </div>
    @else
        <div class="flex flex-col mx-10 w-[400px] justify-center">
            <img class="" src="{{ $image }}" alt="">
        </div>
    @endif
    @endisset
--}}

    <x-testimonial-card
            :content="$testimonial->content"
            :client-name="$testimonial->client->name"
    />

</div>

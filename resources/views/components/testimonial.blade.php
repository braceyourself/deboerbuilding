@php /** @var App\Models\Testimonial $testimonial **/ @endphp

@props([
    'testimonial',
    'imagePosition' => 'left',
    'image',
    'maxHeight' => null
])


<div class="flex flex-col justify-between bg-white p-6 shadow-lg rounded-2xl">
    <p class="text-gray-950 italic text-lg">"{{$testimonial->content}}"</p>

    <div class="mt-4 flex items-center justify-center">
        <x-heroicon-c-user-circle class="w-12 h-12 text-primary-500"/>
        <div class="ml-3 text-left">
            <p class="text-sm font-semibold text-gray-800">{{ $testimonial->client->name }}</p>
        </div>
    </div>
</div>



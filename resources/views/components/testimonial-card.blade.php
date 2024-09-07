@props([
    'content',
    'clientName'
])
<div class="bg-white p-6 rounded-lg shadow h-fit w-auto mx-2 md:w-[600px] text-2xl">
    <p class="text-gray-600">"{!! $content !!}"</p>
    <p class="mt-2 text-gray-800 text-3xl font-semibold">- {{ $clientName }}</p>
</div>

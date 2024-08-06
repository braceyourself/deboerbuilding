<x-layouts.guest class="px-2 md:px-10">

    <div class="container m-auto flex flex-col gap-10 py-10">
        <h1 class="text-5xl">{{ $service->name }}</h1>
        <p class="text-xl">{{ $service->description ?? $service->short_description }}</p>
        <img class="rounded-xl border-primary border-2"
             src="{{ $service->image->url }}"
             alt="{{ $service->image->alt ?? str("{$service->name}-image")->slug() }}">
    </div>

</x-layouts.guest>

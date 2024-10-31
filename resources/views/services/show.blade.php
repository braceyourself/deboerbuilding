<x-layouts.guest class="px-2 md:px-10 py-10">

    <div x-data="{
        images: @js($service->images->load('media')),
        selected: @js($service->images->first() ?? ['media' => $service->image]),
    }">

        <div class="container m-auto flex flex-col lg:flex-row gap-10 py-1 md:py-10">


            <div class="flex-grow flex justify-between flex-col gap-2 text-center">
                <div>
                    <h1 class="text-3xl">{{ $service->name }}</h1>
                    <p class="text-xl">{!! $service->description ?? ' -- no description -- ' !!}</p>
                </div>

                <x-button href="/contact?comment=I'd like a quote for {{ $service->name }}">
                    Request a Free Quote
                </x-button>
            </div>

            <div class="hidden md:grid gap-4">
                <div>
                    <img class="m-auto h-96 max-w-[100%] lg:max-w-xl rounded-lg shadow object-cover object-center"
                         :src="selected.media.url"/>
                </div>
            </div>

        </div>

        <div class="hidden md:grid grid-cols-5 gap-1 md:gap-4">
            <template x-for="i in images">
                <img :src="i.media.url"
                     @click="selected = i"
                     class="h-full max-w-full rounded-lg cursor-pointer hover:scale-105 hover:shadow transition-all"
                     alt="...">
            </template>
        </div>

        <div class="md:hidden flex flex-col gap-3">
            <template x-for="i in images">
                <img :src="i.media.url"
                     class="m-auto h-auto max-w-[100%] lg:max-w-xl rounded-lg shadow object-cover object-center"
                     alt="...">
            </template>

        </div>


    </div>

</x-layouts.guest>

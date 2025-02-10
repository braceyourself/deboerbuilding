<div class="text-black dark:text-white max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row gap-10 justify-around my-10 md:my-48 max-w-4xl mx-auto md:px-10">
        <img class="h-fit w-fit self-center" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo.png') }}" alt="DeBoer Building LLC" />
        <div class="m-auto px-4 md:px-10 text-md md:text-3xl text-center max-w-96 md:max-w-[90%]">
            {{ \App\Models\PageContent::whereSlug('about')->first()?->content }}
        </div>
    </div>

    @include('livewire.about-page.modals')

    @foreach($this->data as $k => $item)
        @php($flip = $k % 2 == 0)

        <div class="lg:py-24" x-data="{hovering: false}" >
            <div class="bg-gray-900" x-on:mouseover="hovering = true" x-on:mouseleave="hovering = false">
                <div @class([
                    "flex flex-col justify-center lg:gap-8",
                    'py-24 sm:py-32 lg:py-0',
                    'px-4 lg:px-8',
                    'lg:flex-row' => $flip,
                    'lg:flex-row-reverse' => !$flip,
                ])>

                    <div class="lg:-my-8 shadow lg:min-w-[300px] flex-grow">
                        <div class="h-full w-full flex justify-center shadow rounded-xl lg:border border-primary" >
                            <img src="/storage/{{ $item['image'] }}"
                                 class="object-cover shadow-none lg:shadow-xl rounded-xl
                                        ease-in-out duration-300
                                        lg:border-none border border-primary
                                        w-full
                                        max-h-100
                                        "
                                 :class="{
                                    'lg:translate-y-4 lg:-translate-x-4': hovering,
                                    'scale-5 transition': hovering,
                                 }"
                                 alt=""
                                 {!! $item['image_properties'] !!}
                            >
                        </div>
                    </div>


                    <div @class([
                        'text-center',
                        'max-w-md sm:max-w-2xl ',
                        'lg:px-0 lg:py-20',
                        'mx-auto lg:mx-0',
                        'lg:text-left' => $flip,
                        'lg:text-right' => !$flip,
                    ])>
                        <h2 class="text-2xl md:text-5xl underline text-primary">
                            {{ $item['name'] }}
                        </h2>
                        <div class="mb-10 text-lg md:text-3xl">
                            {{ str($item['position'])->explode('/')->join(' | ') }}
                        </div>
                        <div class="text-md md:text-2xl">
                            {{ $item['blurb'] }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endforeach

    <x-filament-actions::modals />
</div>

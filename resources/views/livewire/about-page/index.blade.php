<div>
    <div class="flex flex-col md:flex-row gap-10 justify-around my-48 max-w-4xl mx-auto px-10">
        <img class="h-fit w-fit self-center" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo.png') }}" alt="DeBoer Building LLC" />
        <div class="m-auto px-10 text-3xl text-center ">
            Our goal at DeBoer Building is to use the talents God has given us to improve homes while building lasting relationships of trust and respect with all the people we come in contact with. We seek to give each customer an enjoyable remodeling experience by giving personal attention, value and quality that meets and exceeds their expectations.
        </div>
    </div>

    @include('livewire.about-page.modals')

    @foreach($this->data as $k => $item)
        @php($flip = $k % 2 == 0)

        <div class="lg:py-24" x-data="{hovering: false}" >
            <div class="bg-gray-900" x-on:mouseover="hovering = true" x-on:mouseleave="hovering = false">
                <div class="flex flex-col justify-center {{ $flip ? 'lg:flex-row' : 'lg:flex-row-reverse' }} lg:gap-8 lg:px-8 py-24 sm:py-32 lg:py-0">

                    <div class="lg:-my-8 shadow">
                        <div class="h-full w-full flex justify-center shadow rounded-xl lg:border border-primary" >
                            <img src="/storage/{{ $item['image'] }}"
                                 class="object-cover shadow-none lg:shadow-xl rounded-xl
                                        ease-in-out duration-300
                                        lg:border-none border border-primary
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


                    <div class="text-white text-center lg:{{ $flip ? 'text-left' : 'text-right' }} max-w-md px-6 sm:max-w-2xl lg:px-0 lg:py-20 mx-auto lg:mx-0">
                        <h2 class="text-5xl underline text-primary">
                            {{ $item['name'] }}
                        </h2>
                        <div class="mb-10 text-3xl">
                            {{ str($item['position'])->explode('/')->join(' | ') }}
                        </div>
                        <div class="text-2xl">
                            {{ $item['blurb'] }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endforeach

    <x-filament-actions::modals />
</div>

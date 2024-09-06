<section id="testimonials" class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center">Customer Testimonials</h2>
    <div class="container mt-8 space-y-6">
        @foreach(\App\Models\Testimonial::limit(3)->get() as $k => $t)
            <div class="flex gap-10 justify-center">
                @php
                // k is even
                $leftImage = $k % 2 === 0;
                $rightImage = !$leftImage;
                @endphp

                @if($leftImage)
                <div class="relative block w-[200px] h-[350px]">
                    <img class="absolute" src="{{ Vite::asset('resources/images/at_home.svg') }}" alt="">
                    <img class="absolute" src="{{ Vite::asset('resources/images/family.svg') }}" alt="">
                </div>
                @endif

                <div class="bg-white p-6 rounded-lg shadow h-fit w-[400px]">
                    <p class="text-gray-600">"{!! $t->content !!}"</p>
                    <p class="mt-2 text-gray-800 font-semibold">- {{ $t->client->name }}</p>
                </div>

                @if($rightImage)
                <div class="relative block w-[200px]">
                    <img class="absolute" src="{{ Vite::asset('resources/images/at_home.svg') }}" alt="">
                    <img class="absolute" src="{{ Vite::asset('resources/images/family.svg') }}" alt="">
                </div>
                @endif
            </div>
        @endforeach
        <!-- Add more testimonials here -->
    </div>
</section>

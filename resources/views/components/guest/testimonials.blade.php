<section id="testimonials" class="mx-auto py-52 bg-secondary">
    <h2 class="text-5xl pb-10 font-bold text-center">
        Customer <span class="text-primary underline">Testimonials</span>
    </h2>
    <div class="container mt-8 flex flex-col gap-20 space-y-6 font-bold text-lg m-auto">
        @php
            $list = \App\Models\Testimonial::limit(3)->get()->map(function($t, $k){
                $t->image_position = $k % 2 == 0 ? 'left' : 'right';

                return $t;;
            });
        @endphp

        <x-testimonial :testimonial="$list->get(0)"
                       image-position="left"
        >
            <x-slot:image class="w-[200px] m-auto pb-10">
                <img class="" src="{{ Vite::asset('resources/images/at_home.svg') }}" alt="">
                <img class="absolute -bottom-10 -right-10 mb-10" src="{{ Vite::asset('resources/images/family.svg') }}" alt="">
            </x-slot:image>
        </x-testimonial>

        <x-testimonial :testimonial="$list->get(1)"
                       :image="Vite::asset('resources/images/everyday_life.svg')"
                       image-position="right"
        />

        <x-testimonial :testimonial="$list->get(2)"
                       :image="Vite::asset('resources/images/absorbed.svg')"
                       image-position="left"
        />

{{--        read more--}}
        <div class="text-center pt-20">
            <a href="{{ route('testimonials') }}" class="text-primary underline text-5xl">Read more testimonials</a>
        </div>

    </div>
</section>

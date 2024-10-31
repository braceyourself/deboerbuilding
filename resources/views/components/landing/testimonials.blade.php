<section id="testimonials" {{ $attributes }}>

    <h2 class="text-xl md:text-5xl pb-10 font-bold text-center">
        Customer <span class="text-primary underline">Testimonials</span>
    </h2>

    <div id="default-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-96 overflow-visible rounded-lg md:h-96">

            @foreach($testimonials = \App\Models\Testimonial::get() as $t)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <x-testimonial :testimonial="$t"
                                   max-height="250px"
                                   class=" overflow-hidden absolute block rounded w-[90vw] max-w-lg -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"/>
                </div>
            @endforeach
        </div>

        <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-secondary/30 dark:bg-secondary-800/30 group-hover:bg-primary dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                         aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 6 10">
                        <path stroke="currentColor"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">
                        Previous
                    </span>
                </span>
        </button>

        <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-secondary/30 dark:bg-secondary-800/30 group-hover:bg-primary dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
        </button>
    </div>
    {{--        read more--}}
    <div class="text-center pt-20">
        <x-button href="/testimonials" class="bg-secondary-400 hover:bg-primary-600">Read All Testimonials</x-button>
    </div>
</section>

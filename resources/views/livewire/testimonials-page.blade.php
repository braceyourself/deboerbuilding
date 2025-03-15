<div class="bg-secondary px-10">
    <section id="testimonials" class="mx-auto py-10 bg-secondary">
        <h2 class="max-[366px]:text-3xl min-[366px]:text-4xl md:text-5xl pb-10 font-bold text-center">
            Customer <span class="text-primary-500 underline">Testimonials</span>
        </h2>
        <div class="container mt-8 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 font-bold text-lg m-auto  max-w-7xl">
            @foreach($this->records as $r)
                <x-testimonial :testimonial="$r" class="mx-3"/>
            @endforeach
        </div>
    </section>

    <div x-data x-intersect.margin.500px="$wire.loadMore()" class="p-4">
        <div wire:loading wire:target="loadMore"
             class="loading-indicator">
            Loading more posts...
        </div>
    </div>
</div>

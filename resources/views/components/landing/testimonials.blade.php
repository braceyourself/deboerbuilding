<section id="testimonials" {{ $attributes }}>
    <div class="flex flex-row overflow-x-scroll" @mousedown="handleMouseDown" @mouseup="handleMouseUp"
         @mousemove="handleDrag"
         style="
            scrollbar-width: none;
            scrollbar-color: var(--primary) var(--secondary);
            -ms-overflow-style: none;
            user-select: none;
         "
         x-data="{
            mouseIsDown: false,
            scrollLeft: 0,
            init(){

            },
            handleDrag(){
                if(this.mouseIsDown){
                    this.$el.scrollLeft = this.$el.scrollLeft - (event.movementX * 3)
                }
            },
            handleMouseDown(){
                this.mouseIsDown = true;
            },
            handleMouseUp(){
                this.mouseIsDown = false;
            }
         }"
    >
        <section class="py-12 px-6 mx-auto">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-primary mb-6">What Our Customers Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 place-items-start md:justify-between">
{{--                    grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6--}}
                    @foreach($testimonials = \App\Models\Testimonial::get() as $testimonial)
                        <x-testimonial :testimonial="$testimonial" class="mx-3"/>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</section>

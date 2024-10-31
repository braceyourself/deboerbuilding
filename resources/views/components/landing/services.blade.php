<section id="services" {{ $attributes }}
         x-data="{
    services: @js(\App\Models\Service::enabled()->get()),
    selected: null,
    init(){
        this.selected = this.services[0];
    }
}">

    {{--    flex container--}}
    <div @class([
        "flex flex-col md:flex-row gap-4 justify-center ",
        "p-4 mx-auto",
        "text-center md:text-left"
    ])>

        <div class="flex flex-col min-w-fit">
            <h1 class="text-2xl font-bold text-white">Services</h1>
            <div class="text-lg mb-4">What can we do for you?</div>
            <div class="flex md:flex-col gap-2 flex-wrap md:flex-nowrap">
                <template x-for="s in services">
                    <div
                        :class="{
                            'bg-white text-black': selected.id == s.id,
                            'bg-amber-950 text-white hover:bg-gray-300 hover:text-black hover:shadow-lg': selected.id != s.id,
                            'cursor-pointer rounded text-center px-2 py-1 flex-grow': true,
                        }"
                        @click="selected = s"
                        x-text="s.name"
                    ></div>
                </template>
            </div>
        </div>

        <div class="relative overflow-hidden rounded">
            <div class="absolute p-5 transition-all bg-gradient-to-b from-transparent to-white w-full h-full z-10 flex flex-col justify-end">
                <div x-ref="content" class="flex flex-col gap-2">
                    <span x-text="selected.name" class="text-amber-950 text-lg md:text-2xl"></span>
                    <span x-html="selected.short_description"></span>
                    <x-button href ::href="'/services/'+selected.id">Details</x-button>
                </div>
            </div>
            <img :src="selected.image_url" @class([
                "max-w-xl max-h-[50vh]",
                "h-full object-cover rounded image-with-border w-full md:w-[50vw] shadow-black"
            ])>
        </div>
    </div>
</section>
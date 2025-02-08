<x-layouts.guest class="px-2 md:px-10 py-10">

    <div x-data="{
        images: @js($service->images->load('media')),
        selected: null,
        primary: null,

        init(){
            this.primary = this.images[0];
            this.selected = this.images[0];
        },

        // this function should return the image src of the previous image in the array
        // if this is the first image, it should return the last image in the array
        getPreviousImageSrc(){
            // current image index
            let index = this.images.indexOf(this.selected);

            if(index === 0){
                return this.images[this.images.length - 1].media.url;
            }

            let previous = this.images[index - 1];

            if(previous){
                return previous.media.url;
            }
        },

        // this function should return the image src of the next image in the array
        // if this is the last image, it should return the first image in the array
        getNextImageSrc(){
            let index = this.images.indexOf(this.selected);

            if(index === this.images.length - 1){
                return this.images[0].media.url;
            }

            let next = this.images[index + 1];

            if(next){
                return next.media.url;
            }
        }


    }">

        {{--        overlay container--}}
        <div class="flex flex-col justify-center fixed inset-0 text-white bg-black bg-opacity-80 z-50" x-show="selected" @click="selected = null">

                <div>
                    <button @click="selected = null" class="absolute top-0 right-0 m-4 text-3xl text-white hover:text-primary">
                        &times;
                    </button>
                </div>


                 <div class="flex flex-col gap-10 lg:flex-row justify-center ">
                     {{--            previous image--}}
                     <img class="m-auto h-52 max-h-52 max-w-52 rounded-lg shadow object-cover object-center"
                          @click.stop="selected = images[images.indexOf(selected) - 1] ?? images[images.length - 1]"
                          :src="getPreviousImageSrc"/>

                     <img class="h-96 m-auto max-w-[100%] rounded-lg shadow object-cover object-center"
                          @click.stop
                          :src="selected.media.url"/>

                     {{--            next image--}}
                     <img class="m-auto h-52 max-h-52 max-w-52 rounded-lg shadow object-cover object-center"
                          @click.stop="selected = images[images.indexOf(selected) + 1] ?? images[0]"
                          :src="getNextImageSrc"/>
                 </div>


{{--                a sensible close button thatlooks nice--}}
                <div class="flex justify-center">
                    <button @click="selected = null" class="m-4 text-gray-400 hover:text-primary text-sm">
                        &times; Close Preview
                    </button>
                </div>

        </div>


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
                         :src="primary.media.url"/>
                </div>
            </div>

        </div>

        <div class="hidden md:grid grid-cols-5 gap-1 md:gap-4">
            <template x-for="i in images">
                <img :src="i.media.url"
                     @click="selected = i"
                     class="h-full max-w-full rounded-lg cursor-pointer hover:scale-105 object-cover hover:shadow transition-all"
                     alt="...">
            </template>
        </div>

        <div class="md:hidden flex flex-col gap-5">
            <template x-for="i in images">
                <img :src="i.media.url"
                     class="m-auto h-auto max-w-[100%] lg:max-w-xl rounded-lg shadow object-cover object-center"
                     alt="...">
            </template>
        </div>


    </div>

</x-layouts.guest>

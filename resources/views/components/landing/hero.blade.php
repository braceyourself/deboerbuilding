@php
    $hero_images = \App\Models\Asset::heroImages()->get()->map(function($asset) {
        return $asset->url;
    });

@endphp
<section class="max-h-[50vh] md:max-h-full bg-cover bg-center h-screen text-white transition-all"
         :style="style"
         x-data="{
        images: @js($hero_images),
        style: {
            backgroundImage: null
        },
        init(){
            this.style.background = `linear-gradient(0deg, rgb(143 143 143 / 30%), rgb(0 0 0 / 30%)) 0% 0% / cover,  url(${this.images[Math.floor(Math.random() * this.images.length)]})`
            this.style.backgroundSize = `cover`;
            this.style.backgroundPosition = `center`;
            setInterval(() => {
{{--                this.style.backgroundImage = `url(${this.images[Math.floor(Math.random() * this.images.length)]})`;--}}
            }, 2500);
        }
    }">

    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="text-center">

            <h1 class="text-xl md:text-5xl font-bold" style="text-shadow: 3px 0 7px black;">
                {{ \App\Models\PageContent::whereSlug('headline')->first()?->content }}
            </h1>

            <p class="mt-4 md:text-lg">
                {{ \App\Models\PageContent::whereSlug('tagline')->first()?->content }}
            </p>

            <x-button href="/contact" class="mt-6">
                Request a Free Quote
            </x-button>
        </div>
    </div>
</section>

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
            this.style.backgroundImage = `url(${this.images[Math.floor(Math.random() * this.images.length)]})`;
            setInterval(() => {
                this.style.backgroundImage = `url(${this.images[Math.floor(Math.random() * this.images.length)]})`;
            }, 2500);
        }
    }">

    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="text-center">
            <h1 class="text-5xl font-bold" style="text-shadow: 3px 0 7px black;">Transforming Your Home into Your Dream
                Space</h1>
            <p class="mt-4 text-lg">Specializing in custom home remodeling</p>
            <a href="/contact"
               class="mt-6 inline-block bg-primary text-white py-3 px-6 rounded-xl hover:bg-primary-400 font-bold text-xl">
                Request a Free Quote
            </a>
        </div>
    </div>
</section>

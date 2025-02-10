<div class="container m-auto p-5 md:p-10 text-lg flex flex-col gap-20 max-w-7xl">

    <div class="flex flex-col-reverse xl:flex-row gap-10 justify-around py-32 lg:px-10">

        <iframe width="100%"
                height="448"
                loading="lazy"
                allowfullscreen=""
                referrerpolicy="no-referrer-when-downgrade"
                aria-label="Map of Grand Rapids, MI 49331"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBsh6yJba2R7lA-Varqc1qL9--6Xgmdi_w&amp;q=Greater+Grand+Rapids,MI"
                class="rounded"
        ></iframe>

        <div class="px-10 content-center">
            <h1 class="text-5xl font-bold text-center">Serving the Greater Grand Rapids Area</h1>
            <p class="text-center mt-4">
                We are a full-service home remodeling company serving the greater Grand Rapids area. We specialize in custom home remodeling and are dedicated to providing you with the best service possible.
            </p>

            <div class="flex justify-center mt-10">
                <x-button href="/contact?comment=i'd like a quote for ">
                    Request a Free Quote
                </x-button>
            </div>
        </div>

    </div>


    <div >
        <h1 class="text-5xl font-bold text-center">Our Services</h1>
        <p class="text-center mt-4">We offer a wide range of services to help you transform your home into your dream space.</p>
    </div>

    <div class="flex flex-col justify-around gap-20 ">
        @foreach(App\Models\Service::query()->cache()->get() as $k => $service)
            <x-services-page.item :service="$service" :key="$k" />
        @endforeach
    </div>

    <div class="flex justify-center mt-10">
        <x-button href="/contact?comment=i'd like a quote for " >
            Request a Free Quote
        </x-button>
    </div>

</div>

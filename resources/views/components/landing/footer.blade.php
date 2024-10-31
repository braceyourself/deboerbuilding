<footer class="bg-primary text-white py-12 flex flex-col text-center md:text-left">

    <div class="flex flex-col md:flex-row-reverse justify-around my-10 px-10 gap-10 container m-auto">

        <div>
            <h2 class="font-bold text-3xl mb-2">Services</h2>
            <ul>
                @foreach(\App\Models\Service::inFooter()->get() as $service)
                    <li>
                        <a href="{{ route('services.show', $service) }}" class="text-white">{{ $service->footer_text ?? $service->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>


        <x-landing.contact class="max-w-25" />

    </div>

    <div class="container mx-auto text-center">
        &copy; 2024 DeBoer Building LLC. All rights reserved.
    </div>
</footer>

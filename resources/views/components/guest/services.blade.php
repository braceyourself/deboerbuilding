<section id="services" class="flex flex-col min-h-[1000px] md:flex-row ">
    @php
        $count = \App\Models\Service::enabled()->count();
        $columns = $count > 3 ? 3 : $count;
    @endphp

    @foreach(\App\Models\Service::enabled()->get() as $service)
        <x-service-card :service="$service" />
    @endforeach
</section>

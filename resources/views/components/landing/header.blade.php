<header {{ $attributes->merge([
    'class' => "bg-white shadow fixed w-full z-50 border-primary border-b-2 shadow-md"
]) }}>
    <div class="container mx-auto flex justify-between items-center p-5" x-data="{ show_mobile_nav: false }">
        <x-partials.logo />

        <x-partials.mobile-nav />

        <x-partials.nav class="hidden md:flex gap-4" />
    </div>
</header>

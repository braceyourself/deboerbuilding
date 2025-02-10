<header {{ $attributes->merge([
    'class' => "bg-white shadow fixed w-full z-50 border-primary border-b-2 shadow-md"
]) }}>
    <div class="container mx-auto flex justify-between items-center p-5" x-data="{ show_mobile_nav: false }">
        <x-partials.logo />

        <button type="button" @click="show_mobile_nav = !show_mobile_nav">
            <x-heroicon-c-bars-3 class="w-10 text-black md:hidden"/>
        </button>

        <div :class="{
            'opacity-100 pointer-events-auto': show_mobile_nav,
            'opacity-0 pointer-events-none': !show_mobile_nav
        }"
             @click="show_mobile_nav = false"
             class="fixed inset-0 transition-opacity duration-300 ease-in-out bg-black/90 text-white h-[100vh]"
             x-cloak
        >

            <div class="flex flex-col h-[100vh] text-center justify-center">
                <x-partials.logo class="h-[150px] my-10" />
                <x-partials.nav class="text-primary flex flex-col gap-10 uppercase mb-40" />
            </div>

        </div>

        <x-partials.nav class="hidden md:flex gap-4" />
    </div>
</header>

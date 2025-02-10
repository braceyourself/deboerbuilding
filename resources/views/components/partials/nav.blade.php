<nav {{ $attributes->merge(['class' => 'px-10 text-center']) }}>
    <x-nav-link href="/services">Services</x-nav-link>
    <x-nav-link wire:navigate.hover href="/about">About</x-nav-link>
    <x-nav-link wire:navigate.hover href="/testimonials">Testimonials</x-nav-link>
    <x-nav-link wire:navigate.hover href="/contact">Contact</x-nav-link>
</nav>

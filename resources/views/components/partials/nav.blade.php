@props([
    'link_class' => null,
])
<nav {{ $attributes->merge(['class' => 'space-x-4 ']) }}>
    <a href="/services" class="{{ $link_class }}">Services</a>
    <a href="/about" class="{{ $link_class }}">About</a>
    <a href="/testimonials" class="{{ $link_class }}">Testimonials</a>
    <a href="/contact" class="{{ $link_class }}">Contact</a>
</nav>

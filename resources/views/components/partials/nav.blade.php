@props([
    'link_class' => null,
])
@php
    $link_class = "{$link_class} w-min mx-auto"
@endphp
<nav {{ $attributes->merge(['class' => 'px-10 text-center']) }}>
    <a href="/services" class="{{ $link_class }}">Services</a>
    <a href="/about" class="{{ $link_class }}">About</a>
    <a href="/testimonials" class="{{ $link_class }}">Testimonials</a>
    <a href="/contact" class="{{ $link_class }}">Contact</a>
</nav>

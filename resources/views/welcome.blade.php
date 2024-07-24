<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <title>DeBoer Building LLC</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">
<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center p-5">
        <img src="resources/images/logo.png" alt="DeBoer Building LLC" class="h-12">
        <nav class="space-x-4">
            <a href="#services" class="text-gray-600 hover:text-gray-900">Services</a>
            <a href="#portfolio" class="text-gray-600 hover:text-gray-900">Portfolio</a>
            <a href="#testimonials" class="text-gray-600 hover:text-gray-900">Testimonials</a>
            <a href="#contact" class="text-gray-600 hover:text-gray-900">Contact</a>
        </nav>
    </div>
</header>

<main>
    <section class="bg-cover bg-center h-screen text-white" style="background-image: url('path/to/hero-image.jpg');">
        <div class="container mx-auto h-full flex justify-center items-center">
            <div class="text-center">
                <h1 class="text-5xl font-bold">Transforming Your Home into Your Dream Space</h1>
                <p class="mt-4 text-lg">Specializing in custom home remodeling</p>
                <a href="#contact" class="mt-6 inline-block bg-blue-600 text-white py-3 px-6 rounded-full hover:bg-blue-700">Get a Quote</a>
            </div>
        </div>
    </section>

    <section id="services" class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Kitchen Remodeling</h3>
                <p class="mt-2 text-gray-600">Transform your kitchen into a modern, functional space.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Bathroom Remodeling</h3>
                <p class="mt-2 text-gray-600">Upgrade your bathroom with our expert remodeling services.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold">Basement Finishing</h3>
                <p class="mt-2 text-gray-600">Turn your basement into a comfortable living area.</p>
            </div>
        </div>
    </section>

    <section id="portfolio" class="bg-gray-200 py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center">Our Portfolio</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                <!-- Add project images and descriptions here -->
            </div>
        </div>
    </section>

    <section id="testimonials" class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center">Customer Testimonials</h2>
        <div class="mt-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-600">"DeBoer Building transformed our home beyond our expectations. Highly recommended!"</p>
                <p class="mt-2 text-gray-800 font-semibold">- Satisfied Customer</p>
            </div>
            <!-- Add more testimonials here -->
        </div>
    </section>

    <section id="contact" class="bg-blue-600 text-white py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Contact Us</h2>
            <p class="mt-4">Phone: (616) 363-3277</p>
            <p>Email: info@deboerbuilding.com</p>
            <p class="mt-4">Hours: M-F 8am-5pm (Office closed on Fridays, but crew works M-F)</p>
            <a href="https://www.deboerbuilding.com/contact.html" class="mt-6 inline-block bg-white text-blue-600 py-3 px-6 rounded-full hover:bg-gray-200">Contact Form</a>
        </div>
    </section>
</main>

<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
        &copy; 2024 DeBoer Building LLC. All rights reserved.
    </div>
</footer>
@livewireScripts
</body>
</html>

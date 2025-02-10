import './bootstrap';
import 'flowbite/dist/flowbite.min.js';
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles

import.meta.glob([
    '../images/**',
    // '../fonts/**',
]);

AOS.init({
    duration: 800,
    easing: 'slide',
    delay: 200,
});

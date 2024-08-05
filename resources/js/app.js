import './bootstrap';
import 'flowbite';
import $ from 'jquery';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    console.log('jQuery is ready!');
    
    // Example usage
    $('#testBtn').on('click', function() {
        alert('Button clicked!');
    });
});
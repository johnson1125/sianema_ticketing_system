import $ from 'jQuery';
import './bootstrap';

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
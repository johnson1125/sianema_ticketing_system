import $ from 'jquery';
 
 $(document).ready(function() {
        $('#hamburger').click(function() {
            $('#responsive-menu').toggleClass('hidden');
            $('#menu-open').toggleClass('hidden');
            $('#menu-close').toggleClass('hidden');
        });
    });
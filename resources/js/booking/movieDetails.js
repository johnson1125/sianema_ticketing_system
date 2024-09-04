import $ from "jquery";

$(document).ready(function() {
    // Function to update the highlighted button
    function updateHighlightedButton(button) {
        // Remove 'highlighted' class from all buttons
        $('.date-button').removeClass('highlighted');
        
        // Add 'highlighted' class to the specified button
        $(button).addClass('highlighted');
        
        // Save the value of the highlighted button in localStorage
        localStorage.setItem('highlightedDateButton', $(button).val());
    }

    // Retrieve the saved highlighted button value from localStorage
    var savedHighlight = localStorage.getItem('highlightedDateButton');

    // Check if a saved highlighted button value exists
    if (savedHighlight) {
        // Find the button that matches the saved value and highlight it
        $('.date-button').each(function() {
            if ($(this).val() === savedHighlight) {
                $(this).addClass('highlighted'); // Highlight the saved button
            }
        });
    } else {
        // Highlight the first button if no saved value exists
        $('.date-button').first().addClass('highlighted');
    }

    // Add a click event listener to date buttons
    $('.date-button').on('click', function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Update the highlighted button and save the state
        updateHighlightedButton(this);

        // Set a flag in sessionStorage to indicate the form submission
        sessionStorage.setItem('formSubmitted', 'true');

        // Submit the form after highlighting
        $(this).closest('form').submit();
    });

    // Clear highlighted button from localStorage on page unload if it's not a form submission
    $(window).on('beforeunload', function(event) {
        // Check if the page is being unloaded due to a form submission
        const formSubmitted = sessionStorage.getItem('formSubmitted');

        // Clear the highlight only if the form was not submitted
        if (!formSubmitted) {
            localStorage.removeItem('highlightedDateButton');
        }
    });

    // Clear the form submission flag after the page is fully loaded
    $(window).on('pageshow', function() {
        sessionStorage.removeItem('formSubmitted');
    });
});

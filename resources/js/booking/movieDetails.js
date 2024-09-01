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
                updateHighlightedButton(this);
            }
        });
    } else {
        // Highlight the first button if no saved value exists
        $('.date-button').first().addClass('highlighted');
    }

    // Add a click event listener to date buttons
    $('.date-button').on('click', function() {
        // Update the highlighted button and save the state
        updateHighlightedButton(this);
    });
});
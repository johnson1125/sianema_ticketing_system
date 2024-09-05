import $ from "jquery";

// Define the image sources using Blade templating
const standardSeatSrc = "/images/standardSeat.png";
const selectedSeatSrc = "/images/selectedseat.png";

$(document).ready(function () {
    $(document).on('click', '.standardSeatImg', function () {
        var image = $(this).attr("src");

        // Normalize the image URL by removing any protocol and domain parts
        var normalizedImage = image.replace(window.location.origin, '');

        // Check for image source and toggle between seat states
        if (normalizedImage === standardSeatSrc) {
            $(this).attr("src", selectedSeatSrc);
            $(this).addClass("selected-seat-no");
            console.log('Seat selected.');
        } else if (normalizedImage === selectedSeatSrc) {
            $(this).attr("src", standardSeatSrc);
            $(this).removeClass("selected-seat-no");
            console.log('Seat deselected.');
        }

        // Update the selected seats display
        var selectedSeatsNo = [];
        var selectedSeatsID = [];
        $(".selected-seat-no").each(function () {
            selectedSeatsNo.push($(this).attr("alt"));
            selectedSeatsID.push($(this).attr("data-seat-id")); // Changed from 'commandargument' to 'data-seat-id'
        });
        $("#selectedSeat").text(selectedSeatsNo.join(", "));
        $("#selectedSeatNumbers").val(selectedSeatsID.join(","));
    });
});

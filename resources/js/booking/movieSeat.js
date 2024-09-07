import $ from "jquery";

// Define the image sources using Blade templating
const standardSeatSrc = "/images/standardSeat.png";
const selectedStandardSeatSrc = "/images/selectedStandardSeat.png";
const premiumSeatSrc = "/images/premiumSeat.png";
const selectedPremiumSeatSrc = "/images/selectedLuxurySeat.png";
const familySeatSrc = "/images/familySeat.png";
const selectedFamilySeatSrc = "/images/selectedFamilySeat.png";

$(document).ready(function () {
    $(document).on('click', '.standardSeatImg', function () {
        var image = $(this).attr("src");

        // Normalize the image URL by removing any protocol and domain parts
        var normalizedImage = image.replace(window.location.origin, '');

        // Check for image source and toggle between seat states
        if (normalizedImage === standardSeatSrc) {
            $(this).attr("src", selectedStandardSeatSrc);
            $(this).addClass("selected-seat-no");
            console.log('Seat selected.');
        } else if (normalizedImage === selectedStandardSeatSrc) {
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

    $(document).on('click', '.premiumSeatImg', function () {
        var image = $(this).attr("src");

        // Normalize the image URL by removing any protocol and domain parts
        var normalizedImage = image.replace(window.location.origin, '');

        // Check for image source and toggle between seat states
        if (normalizedImage === premiumSeatSrc) {
            $(this).attr("src", selectedPremiumSeatSrc);
            $(this).addClass("selected-seat-no");
            console.log('Seat selected.');
        } else if (normalizedImage === selectedPremiumSeatSrc) {
            $(this).attr("src", premiumSeatSrc);
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

    $(document).on('click', '.familySeatImg', function () {
        var image = $(this).attr("src");

        // Normalize the image URL by removing any protocol and domain parts
        var normalizedImage = image.replace(window.location.origin, '');

        // Check for image source and toggle between seat states
        if (normalizedImage === familySeatSrc) {
            $(this).attr("src", selectedFamilySeatSrc);
            $(this).addClass("selected-seat-no");
            console.log('Seat selected.');
        } else if (normalizedImage === selectedFamilySeatSrc) {
            $(this).attr("src", familySeatSrc);
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

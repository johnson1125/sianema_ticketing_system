import $ from "jquery";

$(document).ready(function () {
    
    const standardSeatSrc = "/images/standardSeat.png";
    const selectedStandardSeatSrc = "/images/selectedStandardSeat.png";
    const premiumSeatSrc = "/images/premiumSeat.png";
    const selectedPremiumSeatSrc = "/images/selectedLuxurySeat.png";
    const familySeatSrc = "/images/familySeat.png";
    const selectedFamilySeatSrc = "/images/selectedFamilySeat.png";

    const maxSeats = 12;

    function showToast(message) {
        Toastify({
            text: message,
            duration: 3000, 
            close: true,   
            gravity: "top", 
            position: "center", 
            backgroundColor: "#008000", 
            stopOnFocus: true, 
        }).showToast();
    }

    function toggleSeatSelection($seatImg, normalSrc, selectedSrc) {
        var image = $seatImg.attr("src");

        
        var normalizedImage = image.replace(window.location.origin, '');

        
        var selectedSeatsCount = $(".selected-seat-no").length;

        
        if (normalizedImage === selectedSrc) {
            $seatImg.attr("src", normalSrc);
            $seatImg.removeClass("selected-seat-no");
            console.log('Seat deselected.');
        } 
        
        else if (selectedSeatsCount < maxSeats) {
            $seatImg.attr("src", selectedSrc);
            $seatImg.addClass("selected-seat-no");
            console.log('Seat selected.');
        } 
        
        else {
            showToast("You can only select up to 12 seats.");
        }

        
        var selectedSeatsNo = [];
        var selectedSeatsID = [];
        $(".selected-seat-no").each(function () {
            selectedSeatsNo.push($(this).attr("alt"));
            selectedSeatsID.push($(this).attr("data-seat-id")); // Changed from 'commandargument' to 'data-seat-id'
        });
        $("#selectedSeat").text(selectedSeatsNo.join(", "));
        $("#selectedSeatNumbers").val(selectedSeatsID.join(","));
    }

    $(document).on('click', '.standardSeatImg', function () {
        toggleSeatSelection($(this), standardSeatSrc, selectedStandardSeatSrc);
    });

    $(document).on('click', '.premiumSeatImg', function () {
        toggleSeatSelection($(this), premiumSeatSrc, selectedPremiumSeatSrc);
    });

    $(document).on('click', '.familySeatImg', function () {
        toggleSeatSelection($(this), familySeatSrc, selectedFamilySeatSrc);
    });

    // Add event listener for form submission
    $(document).on('submit', 'form', function (e) {
        // Check if any seat is selected
        if ($(".selected-seat-no").length === 0) {
            showToast("Please select at least one seat before proceeding.");
            e.preventDefault(); // Prevent form submission
        }
    });
});

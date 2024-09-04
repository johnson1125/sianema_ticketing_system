import $ from "jquery";

$(document).ready(function () {
    $(".standardSeatImg").click(function () {
        var image = $(this).attr("src");

        // Check for image source and toggle between seat states
        if (image === "{{ asset('images/singleseat.png') }}") {
            $(this).attr("src", "{{ asset('images/selectedseat.png') }}");
            $(this).addClass("selected-seat-no");
        } else if (image === "{{ asset('images/selectedseat.png') }}") {
            $(this).attr("src", "{{ asset('images/singleseat.png') }}");
            $(this).removeClass("selected-seat-no");
        }

        // Update the selected seats display
        var selectedSeatsNo = [];
        var selectedSeatsID = [];
        $(".selected-seat-no").each(function () {
            selectedSeatsNo.push($(this).attr("alt"));
            selectedSeatsID.push($(this).attr("data-seat-id")); // Changed from 'commandargument' to 'data-seat-id'
        });
        $("#selectedSeat").text(selectedSeatsNo.join(", "));
        $("#selectedSeatIDs").val(selectedSeatsID.join(","));
    });
});

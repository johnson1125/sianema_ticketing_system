import $ from "jquery";

$(document).ready(function () {
    // Hide all payment method fields by default
    $('#cardPaymentFields, #fpxFields, #tngFields').hide();

    // Show relevant fields when a payment option is selected
    $('input[name="option"]').on('change', function () {
        var selectedPaymentMethod = $(this).val();

        // Hide all fields
        $('#cardPaymentFields, #fpxFields, #tngFields').hide();

        // Show the relevant fields based on the selected option
        if (selectedPaymentMethod === 'cardPayment') {
            $('#cardPaymentFields').show();
        } else if (selectedPaymentMethod === 'fpx') {
            $('#fpxFields').show();
        } else if (selectedPaymentMethod === 'tng') {
            $('#tngFields').show();
        }
    });
});




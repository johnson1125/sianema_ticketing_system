// Author: Kho Ka Jie

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
        if (selectedPaymentMethod === 'Card Payment') {
            $('#cardPaymentFields').show();
        } else if (selectedPaymentMethod === 'FPX') {
            $('#fpxFields').show();
        } else if (selectedPaymentMethod === 'TNG E-Wallet') {
            $('#tngFields').show();
        }
    });
});




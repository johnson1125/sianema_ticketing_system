import $ from 'jquery';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
//Import select2
import select2 from 'select2';
select2($);
import 'select2/dist/css/select2.min.css';

$(document).ready(function () {
    flatpickr('#startTime', {
        enableTime: true,
        noCalendar: true,
        minTime: "10:00",
        maxTime: "02:00",
        minuteIncrement: 15,
        dateFormat: "h:i K",
        time_24hr: false           
    });


   //Intialize select2
    $('#movies').select2({
        placeholder: 'Select a movie'
    });

});

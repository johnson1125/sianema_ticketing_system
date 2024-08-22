import $ from "jquery";
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

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
});

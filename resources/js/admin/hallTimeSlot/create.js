import $ from "jquery";
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
//Import select2
import select2 from "select2";
select2($);
import "select2/dist/css/select2.min.css";

$(document).ready(function () {
    var movieStartTime = flatpickr("#movieStartTime", {
        enableTime: true,
        noCalendar: true,
        minTime: "10:00",
        maxTime: "02:00",
        minuteIncrement: 15,
        dateFormat: "h:i K",
        time_24hr: false,
        onChange: function (selectedDates, timeStr, instance) {
            console.log(timeStr);
            var startTime = convertTo24HourFormat(timeStr);

            var duration = flatpickr.formatDate(
                movieDuration.selectedDates[0],
                "h:i:s"
            );

            var parts = duration.split(":");

            var endTime = addTime(startTime, parts[0], parts[1], parts[2]);

            movieEndTime.setDate(endTime);
        },
    });

    var movieDuration = flatpickr("#movieDuration", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i",
        time_24hr: false,
    });

    var movieEndTime = flatpickr("#movieEndTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",
        time_24hr: false,
    });

    var maintenanceStartTime = flatpickr("#maintenanceStartTime", {
        enableTime: true,
        noCalendar: true,
        minTime: "10:00",
        maxTime: "02:00",
        minuteIncrement: 15,
        dateFormat: "h:i K",
        time_24hr: false,
        onChange: function (selectedDates, timeStr, instance) {
            console.log(timeStr);
            var startTime = convertTo24HourFormat(timeStr);

            var duration = flatpickr.formatDate(
                maintenanceDuration.selectedDates[0],
                "h:i:s"
            );

            var parts = duration.split(":");

            var endTime = addTime(startTime, parts[0], parts[1], parts[2]);

            maintenanceEndTime.setDate(endTime);
        },
    });

    var maintenanceDuration = flatpickr("#maintenanceDuration", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i",
        time_24hr: false,
    });

    var maintenanceEndTime = flatpickr("#maintenanceEndTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "h:i K",
        time_24hr: false,
    });

    //Intialize select2
    $("#movieSelector")
        .select2({
            placeholder: "Select a movie",
            dropdownPosition: "below",
        })
        .on("change", function (e) {
            var selectedOption = $("#movieSelector option:selected");
            // Movie selection onchange
            console.log(selectedOption.val());

            fetch(
                "http://127.0.0.1:8000/api/movie-data/" + selectedOption.val()
            )
                .then((response) => response.json())
                .then((movieData) => {
                    movieDuration.setDate(movieData.movie_duration);

                    var startTime = flatpickr.formatDate(
                        movieStartTime.selectedDates[0],
                        "H:i:s"
                    );

                    var parts = movieData.movie_duration.split(":");

                    var endTime = addTime(
                        startTime,
                        parts[0],
                        parts[1],
                        parts[2]
                    );

                    $("#movPhoto").attr("src", "data:image/jpeg;base64," + movieData.movie_poster_base64);

                    movieEndTime.setDate(endTime);
                    $("#btnMovieDetails").click(function (e) {
                        e.preventDefault();
                        // Get the ID from the button's data-id attribute
                        var id = selectedOption.val();

                        // Replace the placeholder in the route URL with the actual ID
                        var movieUrl = window.movieUrl.replace(
                            "__ID__",
                            id
                        );

                        movieUrl = movieUrl.replace(
                            "__hallID__",
                            hallID
                        );

                        movieUrl = movieUrl.replace(
                            "__date__",
                            date
                        );

                        // Redirect to the constructed URL
                        location.href = movieUrl;
                    });
                })
                .catch((error) => console.error("Error fetching JSON:", error));

        });

    if ($("#movieSelector").val()) {
        $("#movieSelector").trigger("change");
    }

    //Intialize select2
    $("#maintenanceSelector")
        .select2({
            placeholder: "Select a maintenance",
            dropdownPosition: "below",
        })
        .on("change", function (e) {
            var selectedOption = $("#maintenanceSelector option:selected");
            console.log(selectedOption.val());

            fetch(
                "http://127.0.0.1:8000/api/maintenance-data/" + selectedOption.val()
            )
                .then((response) => response.json())
                .then((maintenanceData) => {
                    maintenanceDuration.setDate(maintenanceData[0].duration);

                    var startTime = flatpickr.formatDate(
                        maintenanceStartTime.selectedDates[0],
                        "H:i:s"
                    );

                    var parts = maintenanceData[0].duration.split(":");

                    var endTime = addTime(
                        startTime,
                        parts[0],
                        parts[1],
                        parts[2]
                    );

                    maintenanceEndTime.setDate(endTime);

                    $("#btnMaintenanceDetails").click(function (e) {
                        e.preventDefault();
                        // Get the ID from the button's data-id attribute
                        var id = selectedOption.val();

                        // Replace the placeholder in the route URL with the actual ID
                        var fullUrl = window.maintenanceUrl.replace(
                            "__ID__",
                            id
                        );

                        fullUrl = fullUrl.replace(
                            "__hallID__",
                            hallID
                        );

                        fullUrl = fullUrl.replace(
                            "__date__",
                            date
                        );

                        // Redirect to the constructed URL
                        location.href = fullUrl;
                    });
                })
                .catch((error) => console.error("Error fetching JSON:", error));
        });
    if ($("#maintenanceSelector").val()) {
        $("#maintenanceSelector").trigger("change");
    }

    function convertStrToTime(time_string) {
        var time = new Date();
        var parts = time_string.split(":");
        time.setHours(parts[0]);
        time.setMinutes(parts[1]);
        time.setSeconds(parts[2]);

        return time;
    }

    function convertTo24HourFormat(timeString) {
        // Split the time string into its components
        var parts = timeString.split(" "); // e.g., ["02:30:00", "PM"]
        var timeParts = parts[0].split(":");
        var hours = parseInt(timeParts[0]);
        var minutes = timeParts[1];
        var period = parts[1];

        // Convert hours based on AM/PM period
        if (period === "PM" && hours !== 12) {
            hours += 12;
        } else if (period === "AM" && hours === 12) {
            hours = 0; // Convert 12 AM to 00 hours
        }

        // Format the hours to always be two digits
        hours = hours.toString().padStart(2, "0");

        // Return the converted time in HH:MM:SS format
        return hours + ":" + minutes + ":" + "00";
    }

    function addTime(dateTimeString, hoursToAdd, minutesToAdd, secondsToAdd) {
        // Parse the dateTimeString into a JavaScript Date object
        var date = convertStrToTime(dateTimeString);

        // Add time
        date.setHours(date.getHours() + parseInt(hoursToAdd));
        date.setMinutes(date.getMinutes() + parseInt(minutesToAdd));
        date.setSeconds(date.getSeconds() + parseInt(secondsToAdd));

        // Format the new date and time as a string
        var formattedDateTime = flatpickr.formatDate(date, "h:i K");

        return formattedDateTime;
    }


    const timeSlots = $(".timeSlots");

    //Fetch Hall TimeSlot Data in JSON format
    fetch("http://127.0.0.1:8000/api/hall-time-slot-data/"+date +'/' +hallID)
        .then((response) => response.json())
        .then((hallTimeSlotsData) => {
            const timeSlotMap = new Map();
            hallTimeSlotsData.forEach((item) => {
                timeSlotMap.set(item.hall_time_slot_id, item);
            });

            updateTimeSlots(timeSlotMap);
        })
        .catch((error) => console.error("Error fetching JSON:", error));

    function updateTimeSlots(timeSlotMap) {
        const updates = [];

        timeSlots.each(function () {
            const $button = $(this);
            const id = $button.attr("id");
            const timeslot = timeSlotMap.get(id);

            if (timeslot) {
                const startTime = extractTime(timeslot.startDateTime);
                const { startSlotIndex, span } = calculateTimeSlotPosition(
                    startTime,
                    timeslot.duration
                );
                const timeSlotPosition = `${startSlotIndex} / span ${span}`;



                updates.push({
                    element: $button,
                    gridColumn: timeSlotPosition,
                    bg_color: (timeslot.timeSlotType == 'Maintenance')? 'bg-red-700' : 'bg-green-700',
                    bg_color_hover: (timeslot.timeSlotType == 'Maintenance')? 'bg-red-800' : 'hover:bg-green-800',
                });
            }
        });

        // Apply all updates in a single reflow
        requestAnimationFrame(() => {
            updates.forEach(({ element, gridColumn,bg_color,bg_color_hover }) => {
                element.css("grid-column", gridColumn);
                element.css("display", "block");
                element.addClass(bg_color);
                element.addClass(bg_color_hover);
            });
        });
    }

    function extractTime(dateTime) {
        // Split the date-time string by space
        const parts = dateTime.split(" ");

        // The time part is the second element
        const time = parts[1];

        return time;
    }

    function calculateTimeSlotPosition(startTime, duration) {
        // Convert start time to minutes
        var [startHour, startMinute, startSecond] = startTime
            .split(":")
            .map(Number);

        if (startHour < 10) {
            startHour += 24;
        }

        const startTimeMinutes = startHour * 60 + startMinute;

        // Convert duration to minutes
        const [durationHour, durationMinute, durationSecond] = duration
            .split(":")
            .map(Number);
        const durationMinutes = durationHour * 60 + durationMinute;

        // Calculate starting slot index
        var startSlotIndex = Math.floor((startTimeMinutes - 600) / 15) + 2;

        // Calculate number of span slots
        const span = Math.ceil(durationMinutes / 15);

        return {
            startSlotIndex,
            span,
        };
    }

    setTimeout(function() { if(errormsg){
        alert("Error Message:\n\n"+ errormsg);
        }},500);

});



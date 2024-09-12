import $ from "jquery";
$(document).ready(function () {
    const timeSlots = $(".timeSlots");

    //Fetch Hall TimeSlot Data in JSON format
    fetch("http://127.0.0.1:8000/api/hall-time-slot-data/"+date)
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

});

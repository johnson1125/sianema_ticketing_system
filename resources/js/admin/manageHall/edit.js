document.addEventListener('DOMContentLoaded', function () {
    const seatForm = document.getElementById('seat-form');

    seatForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData(seatForm);
        const seatUpdates = [];

        document.querySelectorAll('.seat').forEach(seat => {
            if (seat.classList.contains('changed')) {
                seatUpdates.push({
                    seat_id: seat.dataset.seatId,
                    status: seat.dataset.status
                });
            }
        });

        if (seatUpdates.length > 0) {
            formData.append('seatUpdates', JSON.stringify(seatUpdates));
        }

        fetch(seatForm.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Seats updated successfully');
                window.location.reload();
            } else {
                alert('An error occurred while updating seats');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

function toggleSeatStatus(seat) {
    const currentStatus = seat.dataset.status;
    const newStatus = currentStatus === 'open' ? 'occupied' : 'open';

    seat.src = seat.src.replace(currentStatus === 'open' ? 'seat.png' : 'unavailable_seat.png', newStatus === 'open' ? 'seat.png' : 'unavailable_seat.png');
    seat.dataset.status = newStatus;
    seat.classList.add('changed');
}

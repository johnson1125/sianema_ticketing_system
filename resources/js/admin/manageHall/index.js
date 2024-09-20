//Author: Sia Yeong Sheng
function changeHallStatus(hallId, currentStatus) {
    const newStatus = currentStatus === 'open' ? 'closed' : 'open';

    fetch(`/manage/hall/${hallId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status: newStatus })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            document.getElementById('status-' + hallId).textContent = newStatus;
            const button = document.querySelector(`button[onclick="changeHallStatus(${hallId}, '${currentStatus}')"]`);
            button.textContent = newStatus === 'open' ? 'Close Hall' : 'Open Hall';
            button.setAttribute('onclick', `changeHallStatus(${hallId}, '${newStatus}')`);
        } else {
            alert('Failed to update the hall status.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was an issue updating the hall status.');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // Get all forms with the class 'status-form'
    const statusForms = document.querySelectorAll('.status-form');

    // Add an event listener to each form
    statusForms.forEach(form => {
        form.addEventListener('submit', (event) => {
            // Show a confirmation prompt
            const confirmChange = confirm('Are you sure you want to change the hall status?');

            if (!confirmChange) {
                event.preventDefault();
            }
        });
    });
});
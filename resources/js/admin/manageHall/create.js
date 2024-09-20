//Author: Sia Yeong Sheng
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('input[name="hallType"]').forEach((radio) => {
        radio.addEventListener('change', updateHallInfo);
    });
});

function updateHallInfo() {
    const hallType = document.querySelector('input[name="hallType"]:checked').value;
    const hallIdInput = document.getElementById('hallId');
    const hallNameInput = document.getElementById('hallName');
    const seatNumberInput = document.getElementById('seatNumber');
    const hallImageDiv = document.getElementById('hallImage');

    // Make an AJAX request to the controller to retrieve hall information
    fetch(`/admin/halls/get-hall-info/${hallType}`)
        .then(response => response.json())
        .then(data => {
            hallIdInput.value = data.hall_id;
            hallNameInput.value = data.hall_name;
            seatNumberInput.value = data.number_of_seats;

            let imageName = '';
            switch (hallType) {
                case 'Standard':
                    imageName = 'standardHall.png';
                    break;
                case 'Premium':
                    imageName = 'premiumHall.png';
                    break;
                case 'Family':
                    imageName = 'familyHall.png';
                    break;
                default:
                    break;
            }

            hallImageDiv.innerHTML = `<img src="/images/${imageName}" alt="Hall Image">`;
        })
        .catch(error => console.error(error));
}
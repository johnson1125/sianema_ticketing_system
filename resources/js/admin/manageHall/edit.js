document.addEventListener('DOMContentLoaded', () => {
    // Get all seat images for family, standard, and premium seats
    const seatImages = document.querySelectorAll('.familySeatImg, .standardSeatImg, .premiumSeatImg');
    
    // Create an object to store the initial seat statuses
    const initialSeatStatuses = {};
    seatImages.forEach((seatImage) => {
        const seatId = seatImage.alt.replace('Seat ', '');
        const seatType = getSeatType(seatImage);
        const isInitiallyOccupied = seatImage.src.includes(`unavailable${seatType.charAt(0).toUpperCase() + seatType.slice(1)}Seat.png`);
        initialSeatStatuses[seatId] = isInitiallyOccupied ? 'occupied' : 'open';
    });
    
    // Create an object to store the updated seat statuses
    const updatedSeatStatuses = {};
  
    // Add an event listener to each seat image
    seatImages.forEach((seatImage) => {
        seatImage.addEventListener('click', () => {
            // Get the seat ID from the image alt attribute
            const seatId = seatImage.alt.replace('Seat ', '');
            const seatType = getSeatType(seatImage);
  
            // Determine the current status and new status
            const isCurrentlyOccupied = seatImage.src.includes(`unavailable${seatType.charAt(0).toUpperCase() + seatType.slice(1)}Seat.png`);
            const newStatus = isCurrentlyOccupied ? 'open' : 'occupied';
  
            // Update the image source based on the new status
            if (newStatus === 'occupied') {
                seatImage.src = seatImage.src.replace(`${seatType}Seat.png`, `unavailable${seatType.charAt(0).toUpperCase() + seatType.slice(1)}Seat.png`);
            } else {
                seatImage.src = seatImage.src.replace(`unavailable${seatType.charAt(0).toUpperCase() + seatType.slice(1)}Seat.png`, `${seatType}Seat.png`);
            }
  
            // Toggle the seat status and update the status object
            if (newStatus === initialSeatStatuses[seatId]) {
                delete updatedSeatStatuses[seatId];
            } else {
                updatedSeatStatuses[seatId] = newStatus;
            }
  
            // Log updated statuses (for debugging)
            console.log('Updated Seat Statuses:', updatedSeatStatuses);
        });
    });
  
    // Function to get seat type from image class
    function getSeatType(seatImage) {
        if (seatImage.classList.contains('familySeatImg')) {
            return 'family';
        } else if (seatImage.classList.contains('standardSeatImg')) {
            return 'standard';
        } else if (seatImage.classList.contains('premiumSeatImg')) {
            return 'premium';
        }
        return '';
    }
  
    // Get the form and the confirm modify button
    const form = document.getElementById('seat-form');
    const confirmModifyButton = form.querySelector('button[type="submit"]');
    const cancelButton = document.getElementById('cancel-button');
  
    // Add an event listener to the confirm modify button
    confirmModifyButton.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent the form from submitting immediately
  
        // Check if updatedSeatStatuses is not empty
        if (Object.keys(updatedSeatStatuses).length > 0) {
            // Create a hidden input field to store the updated seat statuses
            const seatStatusInput = document.createElement('input');
            seatStatusInput.type = 'hidden';
            seatStatusInput.name = 'seat_statuses';
            seatStatusInput.value = JSON.stringify(updatedSeatStatuses);
  
            // Add the hidden input field to the form
            form.appendChild(seatStatusInput);
  
            // Submit the form
            form.submit();
        } else {
            // Handle the case where updatedSeatStatuses is empty
            alert('No seat statuses have been updated.');
        }
    });
});

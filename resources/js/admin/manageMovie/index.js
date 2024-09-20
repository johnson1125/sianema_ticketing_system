//Author: Sia Yeong Sheng
document.addEventListener('DOMContentLoaded', function () {
    const pageContent = document.getElementById('page-content');
    const loadingSpinner = document.getElementById('loading-spinner');
    const movieRows = document.querySelectorAll('#movie-table-body .movie-row');
    const radioButtons = document.querySelectorAll('input[name="movie_filter"]');

    function filterMovies() {
        const selectedFilter = document.querySelector('input[name="movie_filter"]:checked').value;
        const today = new Date().toISOString().split('T')[0];

        movieRows.forEach(row => {
            const screenUntil = row.getAttribute('data-screen-until');
            if (screenUntil) {
                const screenUntilDate = new Date(screenUntil);
                const todayDate = new Date(today);

                if (selectedFilter === 'on-screen' && screenUntilDate >= todayDate) {
                    row.style.display = ''; // Show the row
                } else if (selectedFilter === 'off-screen' && screenUntilDate < todayDate) {
                    row.style.display = ''; // Show the row
                } else {
                    row.style.display = 'none'; // Hide the row
                }
            } else {
                row.style.display = 'none'; // Hide rows with missing dates
            }
        });
    }

    function checkAllImagesLoaded() {
        const images = document.querySelectorAll('#movie-table-body img');
        let imagesLoaded = 0;

        function imageLoadHandler() {
            imagesLoaded++;
            if (imagesLoaded === images.length) {
                loadingSpinner.style.display = 'none'; // Hide spinner
                pageContent.style.visibility = 'visible'; // Show content
                filterMovies(); // Apply filter
            }
        }

        images.forEach(img => {
            if (img.complete) {
                imageLoadHandler(); // Handle cached images
            } else {
                img.addEventListener('load', imageLoadHandler);
                img.addEventListener('error', imageLoadHandler); // Handle broken images
            }
        });

        // If there are no images, show content immediately
        if (images.length === 0) {
            loadingSpinner.style.display = 'none';
            pageContent.style.visibility = 'visible';
            filterMovies();
        }
    }

    // Add event listeners to the radio buttons
    radioButtons.forEach(radio => {
        radio.addEventListener('change', filterMovies);
    });

    // Check if all images are loaded before showing the page content
    checkAllImagesLoaded();
});


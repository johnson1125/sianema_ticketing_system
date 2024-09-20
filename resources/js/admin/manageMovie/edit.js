//Author: Sia Yeong Sheng
document.addEventListener('DOMContentLoaded', function() {
    const moviePosterInput = document.getElementById('moviePoster');
    const moviePosterPreview = document.getElementById('posterPreview');
    const movieCoverPhotoInput = document.getElementById('movieCoverPhoto');
    const movieCoverPhotoPreview = document.getElementById('coverPhotoPreview');

    function previewImage(input, preview) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    moviePosterInput.addEventListener('change', function() {
        previewImage(moviePosterInput, moviePosterPreview);
    });

    movieCoverPhotoInput.addEventListener('change', function() {
        previewImage(movieCoverPhotoInput, movieCoverPhotoPreview);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const movieLanguageSelect = document.getElementById('movieLanguage');
    const customLanguageContainer = document.getElementById('customLanguageContainer');
    const customLanguageInput = document.getElementById('customLanguage');

    movieLanguageSelect.addEventListener('change', function() {
        if (movieLanguageSelect.value === 'other') {
            customLanguageContainer.style.display = 'block';
            customLanguageInput.required = true; // Make it required if "Other" is selected
        } else {
            customLanguageContainer.style.display = 'none';
            customLanguageInput.value = ''; // Clear custom language input
            customLanguageInput.required = false; // Make it not required if not "Other"
        }
    });

    // Trigger the change event on page load to set the display state
    movieLanguageSelect.dispatchEvent(new Event('change'));
});


document.addEventListener('DOMContentLoaded', function() {
    const subtitleCheckboxes = document.querySelectorAll('.subtitle-checkbox');
    const subtitleInput = document.getElementById('movieSubtitle');

    // Update input field based on checkboxes
    function updateSubtitleField() {
        let subtitles = subtitleInput.value.split(',').map(s => s.trim()).filter(Boolean);
        
        subtitleCheckboxes.forEach(checkbox => {
            if (checkbox.checked && !subtitles.includes(checkbox.value)) {
                subtitles.push(checkbox.value);
            } else if (!checkbox.checked) {
                subtitles = subtitles.filter(subtitle => subtitle !== checkbox.value);
            }
        });

        subtitleInput.value = subtitles.join(', ');
    }

    // Event listener for checkboxes
    subtitleCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSubtitleField);
    });

    // Event listener for manual input
    subtitleInput.addEventListener('input', function() {
        let manualSubtitles = subtitleInput.value.split(',').map(s => s.trim()).filter(Boolean);
        
        subtitleCheckboxes.forEach(checkbox => {
            checkbox.checked = manualSubtitles.includes(checkbox.value);
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const genreCheckboxes = document.querySelectorAll('.genre-checkbox');
    const genreInput = document.getElementById('movieGenre');

    // Update input field based on checkboxes
    function updateGenreField() {
        let genres = genreInput.value.split(',').map(s => s.trim()).filter(Boolean);

        genreCheckboxes.forEach(checkbox => {
            if (checkbox.checked && !genres.includes(checkbox.value)) {
                genres.push(checkbox.value);
            } else if (!checkbox.checked) {
                genres = genres.filter(genre => genre !== checkbox.value);
            }
        });

        genreInput.value = genres.join(', ');
    }

    // Event listener for checkboxes
    genreCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateGenreField);
    });

    // Event listener for manual input
    genreInput.addEventListener('input', function() {
        let manualGenres = genreInput.value.split(',').map(s => s.trim()).filter(Boolean);

        genreCheckboxes.forEach(checkbox => {
            checkbox.checked = manualGenres.includes(checkbox.value);
        });
    });
});
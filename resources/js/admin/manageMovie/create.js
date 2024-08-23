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

@vite(['resources/js/admin/manageMovie/index.js','resources/css/admin/manageMovie/create.css'])

<x-admin-Layout>
    <h1 class="pageTitle">Add Movie</h1>
    <form action="processRegistration.php" method="POST" enctype="multipart/form-data">
        <table border="0" style="width: 100%;">
            <tbody>
                <tr>
                    <td colspan="2">Movie ID: {{ $movieID }}</td>
                </tr>

                <tr>
                    <td style="padding-right: 20px;">Movie Name: <br>
                        <input type="text" name="movieName" style="width: 100%;"></td>
                    <td>Movie Poster: <br>
                        <input type="file" id="moviePosterInput" name="moviePoster" accept="image/*">
                        <img id="moviePosterPreview" src="#" alt="Movie Poster Preview" style="display: none; width: 150px; margin-top: 10px;">
                    </td>
                </tr>

                <tr>
                    <td style="padding-right: 20px;">Movie Genre: <br>
                        <input type="text" name="movieGenre" value="" style="width: 100%;"></td>
                    <td>Movie Cover Photo: <br>
                        <input type="file" id="movieCoverInput" name="movieCover" accept="image/*">
                        <img id="movieCoverPreview" src="#" alt="Movie Cover Preview" style="display: none; width: 150px; margin-top: 10px;">
                    </td>
                </tr>

                <tr>
                    <td style="padding-right: 20px;">Movie Language: <br>
                        <input type="text" name="movieLanguage" value="" style="width: 100%;"></td>
                    <td>Movie Release Date: <br>
                        <input type="text" id="datepicker-autohide" name="movieReleaseDate" style="width: 100%;" placeholder="Select date">
                    </td>
                </tr>

                <tr>
                    <td style="padding-right: 20px;">Movie Subtitle: <br>
                        <input type="text" name="movieSubtitle" value="" style="width: 100%;"></td>
                    <td>Movie Duration: <br>
                        <input type="text" name="movieDuration" value="" style="width: 100%;">
                    </td>
                </tr>

                <tr>
                    <td style="padding-right: 20px;">Movie Distributor: <br>
                        <input type="text" name="movieDistributor" value="" style="width: 100%;"></td>
                    <td>Movie Cast: <br>
                        <input type="text" name="movieCast" value="" style="width: 100%;">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Movie Synopsis: <br>
                        <textarea name="movieSynopsis" rows="4" style="width: 100%;"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Screen Date From/To: <br>
                        <div id="date-range-picker" date-rangepicker class="flex items-center">
                            <div class="relative">
                                <input id="datepicker-range-start" name="start" type="text" style="width: 100%;" placeholder="Select date start">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <input id="datepicker-range-end" name="end" type="text" style="width: 100%;" placeholder="Select date end">
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;">
                        <button type="reset" value="Cancel">Cancel</button>
                        <button type="submit" value="Confirm">Confirm</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script>
       
    </script>
</x-admin-Layout>


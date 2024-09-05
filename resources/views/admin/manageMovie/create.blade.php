    @vite(['resources/js/admin/manageMovie/create.js', 'resources/css/admin/manageMovie/create.css'])

    <x-admin-Layout>
        <h1 class="pageTitle">Add Movie</h1>
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let errorMessages = [];
                    @foreach ($errors->all() as $error)
                        errorMessages.push('{{ $error }}');
                    @endforeach
                    alert('Validation errors:\n\n' + errorMessages.join('\n'));
                });
            </script>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="movieForm" action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-top-left">
                    <div class="form-group">
                        <label for="movieID">Movie ID:</label>
                        <span>{{ $movie_id }}</span>
                        <input type="hidden" name="movieID" value="{{ $movie_id }}">
                    </div>

                    <div class="form-group">
                        <label for="movieName">Movie Name:</label>
                        <br><input class="normal-input" type="text" id="movieName" name="movieName">
                    </div>

                    <div class="form-group">
                        <label for="movieGenre">Movie Genre:</label>
                        <br>
                        <div id="genre-checkbox-container">
                            <label><input type="checkbox" class="genre-checkbox" value="Action"> Action</label>
                            <label><input type="checkbox" class="genre-checkbox" value="Comedy"> Comedy</label>
                            <label><input type="checkbox" class="genre-checkbox" value="Drama"> Drama</label>
                            <label><input type="checkbox" class="genre-checkbox" value="Horror"> Horror</label>
                            <label><input type="checkbox" class="genre-checkbox" value="Romance"> Romance</label>
                        </div>
                        <input class="normal-input" type="text" id="movieGenre" name="movieGenre" placeholder="Specify genres" pattern ="^([a-zA-Z]+(?:-[a-zA-Z]+)*)(, [a-zA-Z]+(?:-[a-zA-Z]+)*)*$">
                        <p class="reminder-message">If you need to input other genre that is not in the options, please follow the format:<br/> Genre1, Genre2, etc.</p>
                    </div>

                    <div class="form-group">
                        <label for="movieLanguage">Movie Language:</label>
                        <br>
                        <select id="movieLanguage" name="movieLanguage" class="normal-input">
                            <option value="English">English</option>
                            <option value="Malay">Malay</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Tamil">Tamil</option>
                            <option value="other">Other</option>
                        </select>
                        <div id="customLanguageContainer" style="display: none;">
                            <input class="normal-input" type="text" id="customLanguage" name="customLanguage" placeholder="Specify other language">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="movieSubtitle">Movie Subtitle:</label>
                        <br>
                        <div id="subtitleContainer">
                            <label class="subtitle-grp"><input type="checkbox" class="subtitle-checkbox" value="English"> English</label>
                            <label class="subtitle-grp"><input type="checkbox" class="subtitle-checkbox" value="Malay"> Malay</label>
                            <label class="subtitle-grp"><input type="checkbox" class="subtitle-checkbox" value="Chinese"> Chinese</label>
                            <label class="subtitle-grp"><input type="checkbox" class="subtitle-checkbox" value="Tamil"> Tamil</label>
                        </div>
                        <input class="normal-input" type="text" id="movieSubtitle" name="movieSubtitle" placeholder="Enter or select subtitles" pattern="^([a-zA-Z]+(?: [a-zA-Z]+)*)(, [a-zA-Z]+(?: [a-zA-Z]+)*)*$">
                        <p class="reminder-message">If you need to input other language that is not in the options, please follow the format:<br/> Subtitle1, Subtitle2, etc.</p>
                    </div>
                    

                    <div class="form-group">
                        <label for="movieDistributor">Movie Distributor:</label>
                        <br><input class="normal-input" type="text" id="movieDistributor" name="movieDistributor">
                    </div>

                    <div>
                        <label for="releaseDate">Release Date:</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                                name="releaseDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>
                    </div>
                </div>

                <div class="form-top-right">
                    <div class="form-group">
                        <label for="moviePoster">Movie Poster:</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            name="moviePoster" id="moviePoster" type="file">
                        <img id="posterPreview" class="image-preview" alt="Movie Poster Preview" />
                    </div>

                    <div class="form-group">
                        <label for="movieCoverPhoto">Movie Cover Photo:</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="movieCoverPhoto" name="movieCoverPhoto" type="file">
                        <img id="coverPhotoPreview" class="image-preview" alt="Movie Cover Photo Preview" />
                    </div>
                    
                    <div class="form-group">
                    <label for="movieDuration">Duration (HH:MM:SS):</label>
                    <input type="text" id="movieDuration" name="movieDuration" class="normal-input"
                        pattern="^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$"
                        placeholder="HH:MM:SS" required>
                    </div>

                </div>

                <div class="form-bottom">
                    <div class="bottom-form-group">
                        <label for="screenDateFromTo">Screen Date From/To:</label>
                        <div id="date-range-picker" date-rangepicker class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide id="datepicker-range-start" name="screen-from"
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date start">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide id="datepicker-range-end" name="screen-until"
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date end">
                            </div>
                        </div>
                    </div>


                    <div class="bottom-form-group">
                        <label for="movieCast">Movie Cast:</label>
                        <br><input class="normal-input" type="text" id="movieCast" name="movieCast">
                    </div>

                    <div class="bottom-form-group">
                        <label for="movieSynopsis">Movie Synopsis:</label>
                        <br>
                        <textarea class="normal-input" name="movieSynopsis" style="width: 100%;"></textarea>
                    </div>

                </div>
            </div>

            <div class="form-actions">
                <button class="cancel" type="reset" onClick="location.href='{{ route('movies.index') }}';">Cancel</button>
                <button class="submit" type="submit">Confirm</button>
            </div>
        </form>
    </x-admin-Layout>

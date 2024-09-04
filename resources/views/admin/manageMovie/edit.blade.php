@vite(['resources/js/admin/manageMovie/edit.js', 'resources/css/admin/manageMovie/edit.css'])

<x-admin-Layout>
    <h1 class="pageTitle">Edit Movie</h1>
    <form id="updateMovieForm" action="{{ route('movies.update', $movie->movie_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
     <div class="form-container">
            <div class="form-top-left">
                <div class="form-group">
                    <label for="movieID">Movie ID:</label>
                    <span>{{ $movie->movie_id }}</span>
                    <input type="hidden" name="movieID" value="{{ $movie->movie_id }}">
                </div>

               <div class="form-group">
                    <label for="movieName">Movie Name:</label>
                    <br><input class="normal-input" type="text" id="movieName" name="movieName" value="{{ $movie->movie_name }}">
                </div>

                <div class="form-group">
                    <label for="movieGenre">Movie Genre:</label>
                    <br><input class="normal-input" type="text" id="movieGenre" name="movieGenre" value="{{ $movie->movie_genre }}">
                </div>

                <div class="form-group">
                    <label for="movieLanguage">Movie Language:</label>
                    <br><input class="normal-input" type="text" id="movieLanguage" name="movieLanguage" value="{{ $movie->movie_language }}">
                </div>

                <div class="form-group">
                    <label for="movieSubtitle">Movie Subtitle:</label>
                    <br><input class="normal-input" type="text" id="movieSubtitle" name="movieSubtitle" value="{{ $movie->movie_subtitle }}">
                </div>

                <div class="form-group">
                    <label for="movieDistributor">Movie Distributor:</label>
                    <br><input class="normal-input" type="text" id="movieDistributor" name="movieDistributor" value="{{ $movie->movie_distributor }}">
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
                            placeholder="Select date" value="{{ \Carbon\Carbon::parse($movie->release_date)->format('m/d/Y') }}">
                    </div>
                </div>
            </div>

            <div class="form-top-right">
                <div class="form-group">
                    <label for="moviePoster">Movie Poster:</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        name="moviePoster" id="moviePoster" type="file">
                    <img id="posterPreview" class="image-preview" src="{{ route('movie.poster', $movie->movie_id) }}" alt="Movie Poster Preview" />
                </div>

                <div class="form-group">
                    <label for="movieCoverPhoto">Movie Cover Photo:</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="movieCoverPhoto" name="movieCoverPhoto" type="file">
                    <img id="coverPhotoPreview" class="image-preview" src="{{ route('movie.cover.photo', $movie->movie_id) }}" alt="Movie Cover Photo Preview" />
                </div>
                
                <div class="form-group">
                <label for="movieDuration">Duration (HH:MM:SS):</label>
                <input type="text" id="movieDuration" name="movieDuration" class="normal-input"
                    pattern="^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$"
                    placeholder="HH:MM:SS" required value="{{ $movie->movie_duration }}">
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
                                value="{{ \Carbon\Carbon::parse($movie->screen_from_date)->format('m/d/Y') }}">
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
                                value="{{ \Carbon\Carbon::parse($movie->screen_until_date)->format('m/d/Y') }}">
                        </div>
                    </div>
                </div>


                <div class="bottom-form-group">
                    <label for="movieCast">Movie Cast:</label>
                    <br><input class="normal-input" type="text" id="movieCast" name="movieCast" value="{{ $movie->movie_cast }}">
                </div>

                <div class="bottom-form-group">
                    <label for="movieSynopsis">Movie Synopsis:</label>
                    <br>
                    <textarea class="normal-input" name="movieSynopsis" style="width: 100%;">{{ $movie->movie_synopsis }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-actions">
            <button class="cancel" type="reset" onClick="location.href='{{ route('movies.index') }}';">Cancel</button>
            <button class="submit" type="submit">Confirm</button>
        </div>
   </form>   
</x-admin-Layout> 

@vite(['resources/css/booking/movieDetails.css'])
<x-app-layout>
    <div class="movie-details-container" id="MovieDetailsContainer">
        <img id="movieCoverPhoto" src="" />

        <div class="movie-details-information-container">

            <h1 id="movieName">
                {{ $movie->name }}
            </h1>

            <ul class="movie-details-info1">
                <li id="movieGenre">
                    {{ $movie->genre }}
                </li>
                <li id="movieLanguage">
                    {{ $movie->language }}
                </li>
                <li id="movieDuration">
                    {{ $movie->duration }}
                </li>
                <li id="movieClassification">
                    {{ $movie->classification }}
                </li>
            </ul>


            <ul class="movie-details-info2">
                <li>
                    <h4>Subtitle</h4>
                    <p id="movieSubtitle">
                        {{ $movie->subtitle }}
                    </p>
                </li>
                <li>
                    <h4>Release Date</h4>
                    <p id="releaseDate">
                        {{ $movie->releaseDate }}
                    </p>
                </li>
                <li>
                    <h4>Cast</h4>
                    <p id="movieCast">
                        {{ $movie->cast }}
                    </p>
                </li>
                <li>
                    <h4>Distributor</h4>
                    <p id="movieDistributer">
                        {{ $movie->distributer }}
                    </p>
                </li>

            </ul>
            <h4>Synopsis</h4>
            <p id="movieSynopsis">
                {{ $movie->synopsis }}
            </p>

        </div>

    </div>

    <div class="cinema-date-selection-container">
        <div class="cinema-date-selection">
            <ul class="date-selection">
                <li>
                    <!--asp:Button ID="dateButton" runat="server" CssClass="date-button" Text='<%# Eval("Date", "{0:ddd\ndd-MMM}").ToUpper() %>' CommandArgument='<%# Eval("Date", "{0:yyyy-MM-dd}") %>' OnClick="DateButton_Click" /-->
                </li>
            </ul>



        </div>
    </div>

    <div class="movie-time-selection-container">
        <div class="movie-time-selection">
            <h2 class="classic-header">Classic</h2>
            <div class="chair-image-container">
                <img src="./images/seatIcon/singleseat.png" height="50" width="50" class="chair-image" />
                <h3 id="selectedDate"></h3>

            </div>
            <div class="movie-time">
                @foreach ($halltimeslots as $timeSlot)
                    <!--asp:Button ID="TimeButton" runat="server" CssClass="time-button" Text='<%# Eval("hallTimeSlotTime") %>' CommandArgument='<%# Eval("hallTimeSlotID") %>' OnClick="Button_Click" /-->
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>

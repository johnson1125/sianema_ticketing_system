@vite(['resources/css/booking/movieSeat.css'])
<x-app-layout>
    <div class="movie-seat-selection-navbar">
        <div class="movie-seat-selection-container">
            <img src="logoSianema.png" alt="Logo" width="160" height="60" class="top-nav-logo">
            <div class="movie-seat-selection-header">
                <h3 id="movieName">
                    {{}}
                </h3>
                <div class="movie-seat-hall-time">
                    <img src="./images/cinemaIcon/hall.png" width="20" height="20" class="icon-image" />

                    <p id="hallNum">
                        {{}}
                    </p>

                    <img src="./images/cinemaIcon/date.png" width="20" height="20" class="icon-image" />

                    <p id="movieDate">
                        {{}}
                    </p>

                    <img src="./images/cinemaIcon/time.png" width="20" height="20" class="icon-image" />

                    <p id="movieTime">
                        {{}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="seat-selection-body">

        <div class="selected-seat-display">
            <h4 id="selectedSeat">
                {{}}
            </h4>

        </div>
    
    
        <div class="seat-select-part">
            <div class="seat-description">
                <img src="./images/seatIcon/selectedseat.png" alt="selectedseat" width="20" height="20" />
                <p>Selected Seats</p>
                <img src="./images/seatIcon/soldseat.png" alt="soldseat" width="20" height="20" />
                <p>Sold</p>
                <img src="./images/seatIcon/singleseat.png" alt="singleseat" width="20" height="20" />
                <p>Single seat</p>
            </div>
    
    
        </div>
    
        <div class="screen-direction">
            <img src="./images/screen/screen.png" width="80" height="50" />
            <img src="./images/screen/upArrow.png" width="20" height="20" />
            <p class="direction-text">SCREEN THIS WAY</p>
        </div>
    
    
        <div class="seat-container">
            @foreach ( as )
            <div id="seatWrapper" runat="server">
                <!--img class="seat" src="./images/seatIcon/<%# Eval("movieSeatStatus").ToString().ToLower() == "available" ? "singleseat" : "soldseat" %>.png" alt="<%# Eval("movieSeatRow") %><%# Eval("movieSeatNo") %>" commandargument='<%# Eval("movieSeatID") %>' -->
                <span class="seat-number">
                    {{}}
                </span>
            </div>
            @endforeach
        </div>
    
        <div class="continueButton-container">
            <!--continue button-->
        </div>
    </section>

<!-- Author: Ong Cheng Leong-->
<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Add Hall Time Slot')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/admin/hallTimeSlot/create.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div id="container">
        <div id="section1">
            <div id='header'>
                <h6>Add Hall Timeslot </h6>
            </div>
        </div>

        <div id="section2"class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50">

            <div class="tabContainer mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#time-slot-type-content"
                    data-tabs-active-classes="text-green-600 hover:text-green-600 dark:text-green-500 dark:hover:text-green-500 border-green-600 dark:border-green-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li class="tab me-2" role="presentation">
                        <button class="tabBtn inline-block p-4 border-b-2 rounded-t-lg " id="movie-tab"
                            data-tabs-target="#movie" type="button" role="tab" aria-controls="movie"
                            aria-selected={{ !session('activeTab') ? ($data['activeTab'] == 'movie' ? 'true' : 'false') : (session('activeTab') == 'movie' ? 'true' : 'false') }}>Movie</button>
                    </li>
                    <li class="tab me-2" role="presentation">
                        <button
                            class="tabBtn inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="maintenance-tab" data-tabs-target="#maintenance" type="button" role="tab"
                            aria-controls="maintenance"
                            aria-selected={{ !session('activeTab') ? ($data['activeTab'] == 'Maintenance' ? 'true' : 'false') : (session('activeTab') == 'maintenance' ? 'true' : 'false') }}
                            {{ (session('maintenanceTabStatus') == 'Disable')||($data['maintenanceTabStatus'] == 'Disable') ? 'disabled' : '' }}>Maintenance</button>
                    </li>
                </ul>
            </div>
            <div id="time-slot-type-content">
                <div id='timeSlotContainer'>
                    <div class="timeSlotHeader">
                        <div class='timeSlotHeader-1'>
                            <div class="timeSlotHeader-1-text">
                                {{ $data['hall']->hall_id }}
                            </div>
                            <div class="timeSlotHeader-1-text">
                                {{ $data['hall']->hall_name }}
                            </div>
                            <div class="timeSlotHeader-1-text">
                                {{ $data['hall']->hall_type }}
                            </div>
                        </div>
                        <div class="timeSlotHeader-2">
                            <h6>Time Slots</h6>
                        </div>
                        <div class="timeSlotHeader-2">

                        </div>
                    </div>
                    <div class="timeSlotBody">
                        <div class="timeHeaderContainer">
                            <div class="timeHeader">10am</div>
                            <div class="timeHeader">11am</div>
                            <div class="timeHeader">12pm</div>
                            <div class="timeHeader">1pm</div>
                            <div class="timeHeader">2pm</div>
                            <div class="timeHeader">3pm</div>
                            <div class="timeHeader">4pm</div>
                            <div class="timeHeader">5pm</div>
                            <div class="timeHeader">6pm</div>
                            <div class="timeHeader">7pm</div>
                            <div class="timeHeader">8pm</div>
                            <div class="timeHeader">9pm</div>
                            <div class="timeHeader">10pm</div>
                            <div class="timeHeader">11pm</div>
                            <div class="timeHeader">12am</div>
                            <div class="timeHeader">1am</div>
                            <div class="timeHeader">2am</div>
                        </div>
                        <div class="timeSlotsContainer">
                            <div class="timeSlotbackground">
                                <div class="emptySpace"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div id="backLine" class="emptySpace"></div>
                            </div>
                            <div class="timeSlotItemContainer">
                                @foreach ($data['hallTimeSlots'] as $hallTimeSlot)
                                    @if ($hallTimeSlot->hall_id == $data['hall']->hall_id)
                                        <button id="{{ $hallTimeSlot->hall_time_slot_id }}" type="button"
                                            class="timeSlots focus:outline-none text-white focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">{{ $hallTimeSlot->timeSlotName }}</button>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>

                <form method="POST" id="movieTimeSlotForm"
                    action="{{ route('hallTimeSlot.store', ['hallID' => urldecode($data['hall']->hall_id), 'date' => $data['date'], 'hallTimeSlotType' => 'Movie']) }}">
                    <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="movie"
                        role="tabpanel" aria-labelledby="movie-tab">

                        @csrf
                        <div id="movieSection1">

                            <div id="movieSection1-1">
                                <div class='selector'>
                                    <label for="movies"
                                        class="movieLabel block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie</label>
                                    <select id="movieSelector" name="movie"
                                        class="select2 js-states form-control bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        style="width: 80%">
                                        @foreach ($data['movies'] as $movie)
                                            <option value="{{ $movie['movie_id'] }}"
                                                {{ $movie['movie_id'] == old('movie') ? 'selected' : '' }}>
                                                {{ $movie['movie_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class=startTimeInput>
                                    <label class="movieLabel" for="startTime">Movie Start Time</label>
                                    <input name="movieStartTime" id="movieStartTime"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="{{ old('movieStartTime', '10:00AM') }}" />
                                </div>

                                <div class=durationDisplay>
                                    <label class="movieLabel" for="duration">Movie Duration</label>
                                    <input id="movieDuration" name='movieDuration'
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('duration','10:00AM')" disabled />
                                </div>

                                <div class=endTimeDisplay>
                                    <label class="movieLabel" for="endTime">Movie End Date </label>
                                    <input id="movieEndTime"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('endTime','10:00AM')" disabled />
                                </div>




                            </div>
                            <div id="movieSection1-2">
                                <div id=movPhotoContainer>
                                    <img id="movPhoto" src="" alt="Photo">
                                </div>

                                <div id="btnContainer">
                                    <button id="btnMovieDetails"
                                        class="btn focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Movie
                                        Details</button>
                                </div>
                            </div>
                        </div>
                        <div id="movieSection2">

                            <a id="btnCancelMaintenance" href="{{ route('hallTimeSlot', ['date' => $data['date']]) }}"
                                class="btn focus:outline-none text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Cancel</a>

                            <button id="btnSaveMovie" type="submit"
                                class="btn focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </div>

                    </div>
                </form>


                <form method="POST" id="movieTimeSlotForm"
                    action="{{ route('hallTimeSlot.store', ['hallID' => $data['hall']->hall_id, 'date' => $data['date'], 'hallTimeSlotType' => 'Maintenance']) }}">
                    <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="maintenance"
                        role="tabpanel" aria-labelledby="maintenance-tab">

                        @csrf
                        <div id="maintenanceSection1">

                            <div id="maintenanceSection1-1">
                                <div class='selector'>
                                    <label for="maintenanceSelector"
                                        class="maintenanceLabel block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maintenance</label>
                                    <select id="maintenanceSelector" name="maintenance"
                                        class="select2 js-states form-control bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        style="width: 80%">
                                        {{-- Get Dynamic option from controller (halltimeSlot.create) --}}
                                        {{-- old() - the option will be selected if the previous input have selected it  --}}
                                        {{-- Use post method to post input data back to controller (halltimeSlot.store) --}}
                                        {{-- use style="width: 30%" to adjust width" --}}
                                        {{-- refer halltimeSlot/create/.js for the usage of select2 --}}
                                        {{-- remove multiple if only select for one --}}
                                        {{-- can refer to select2 documentation for additional configuration --}}
                                        @foreach ($data['maintenanceOption'] as $maintenance)
                                            <option value="{{ $maintenance['id'] }}"
                                                {{ $maintenance['id'] == old('maintenance') ? 'selected' : '' }}>
                                                {{ $maintenance['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class=startTimeInput>
                                    <label class="maintenanceLabel" for="startTime">Maintenance Start Time</label>
                                    <input name="maintenanceStartTime" id="maintenanceStartTime"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="{{ old('maintenanceStartTime', '10:00AM') }}" />
                                </div>


                            </div>
                            <div id="maintenanceSection1-2">
                                <div class=durationDisplay>
                                    <label class="maintenanceLabel" for="duration">Maintenance Duration</label>
                                    <input id="maintenanceDuration" name='maintenanceDuration'
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('duration','10:00AM')" disabled />
                                </div>

                                <div class=endTimeDisplay>
                                    <label class="maintenanceLabel" for="endTime">Maintenance End Date </label>
                                    <input id="maintenanceEndTime"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('endTime','10:00AM')" disabled />
                                </div>
                            </div>
                        </div>
                        <div id="maintenanceSection2">
                            <button id="btnMaintenanceDetails"
                                class="btn focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Maintenance
                                Details</button>
                        </div>
                        <div id="maintenanceSection3">

                            <a id="btnCancelMaintenance" href="{{ route('hallTimeSlot', ['date' => $data['date']]) }}"
                                class="btn focus:outline-none text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Cancel</a>
                            <button id="btnSaveMaintenance" type="submit"
                                class="btn focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </div>
                    </div>
                </form>


            </div>

        </div>


    </div>

    <script>
        var errormsg = @json(session('errorMsg'));
        var date = @json($data['date']);
        var hallID = @json($data['hall']->hall_id);
        window.maintenanceUrl =
            "{{ route('hallTimeSlot.showMaintenanceDetails', ['maintenanceID' => '__ID__', 'hallID' => '__hallID__', 'date' => '__date__']) }}";
        window.movieUrl =
            "{{ route('hallTimeSlot.showMovieDetails', ['movieID' => '__ID__', 'hallID' => '__hallID__', 'date' => '__date__']) }}";
    </script>

@endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/admin/hallTimeSlot/create.js'])
@endpush

@vite(['resources/css/admin/hallTimeSlot/create.css'])
<x-admin-Layout>

    <div id="container">

        <div id="section1"class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50">
            {{-- @foreach ($halls as $hall)
                <div class="timeSlotHeader">
                    <div class="hallName">
                        {{ $hall->hall_id }}
                    </div>
                    <div class="hallType">
                        Big
                    </div>
                    <form action="" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button id="btnAddTimeSlot" type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add
                            TimeSlot</button>
                    </form>
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
                            @foreach ($hallTimeSlots as $hallTimeSlot)
                                @if ($hallTimeSlot->hall_id == $hall->hall_id)
                                    <button id="{{$hallTimeSlot->hall_time_slot_id}}" type="button"
                                        class="timeslots focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                                        @endif
                                @endforeach                  

                        </div>
                    </div>
                </div>
            @endforeach --}}


            <div class="tabContainer mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                    data-tabs-toggle="#time-slot-type-content"
                    data-tabs-active-classes="text-green-600 hover:text-green-600 dark:text-green-500 dark:hover:text-green-500 border-green-600 dark:border-green-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li class="tab me-2" role="presentation">
                        <button class="tabBtn inline-block p-4 border-b-2 rounded-t-lg" id="movie-tab"
                            data-tabs-target="#movie" type="button" role="tab" aria-controls="movie"
                            aria-selected="false">Movie</button>
                    </li>
                    <li class="tab me-2" role="presentation">
                        <button
                            class="tabBtn inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="maintenance-tab" data-tabs-target="#maintenance" type="button" role="tab"
                            aria-controls="maintenance" aria-selected="false">Maintenance</button>
                    </li>
                </ul>
            </div>
            <div id="time-slot-type-content">
                <div id='timeSlotContainer'>
                    <div class="timeSlotHeader">
                        <div class='timeSlotHeader-1'>
                            <div class="hallName">
                                {{-- {{ $hall->hall_id }} --}}
                            </div>
                            <div class="hallType">
                                Big
                            </div>
                        </div>
                        <div class="timeSlotHeader-2">
                            <h6>Time Slots</h6>
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
                                {{-- @foreach ($hallTimeSlots as $hallTimeSlot)
                                @if ($hallTimeSlot->hall_id == $hall->hall_id)
                                    <button id="{{ $hallTimeSlot->hall_time_slot_id }}" type="button"
                                        class="timeslots focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                                @endif
                            @endforeach
                                         --}}
                            </div>
                        </div>
                    </div>

                </div>

                <form method="POST" id="movieTimeSlotForm" action="{{ route('hallTimeSlot.store') }}">
                    <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="movie"
                        role="tabpanel" aria-labelledby="movie-tab">

                        @csrf
                        <div id="movieSection1">

                            <div id="movieSection1-1">
                                <div id='movieSelector'>
                                    <label for="movies"
                                        class="movieLabel block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie</label>
                                    <select multiple id="movies" name="movies[]"
                                        class="select2 js-states form-control bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        style="width: 80%">
                                        {{-- Get Dynamic option from controller (halltimeSlot.create) --}}
                                        {{-- old() - the option will be selected if the previous input have selected it  --}}
                                        {{-- Use post method to post input data back to controller (halltimeSlot.store) --}}
                                        {{-- use style="width: 30%" to adjust width" --}}
                                        {{-- refer halltimeSlot/create/.js for the usage of select2 --}}
                                        {{-- remove multiple if only select for one --}}
                                        {{-- can refer to select2 documentation for additional configuration --}}
                                        @foreach ($movies as $movie)
                                            <option value="{{ $movie['code'] }}"
                                                {{ in_array($movie['code'], old('movies', [])) ? 'selected' : '' }}>
                                                {{ $movie['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id=startTimeInput>
                                    <label class="movieLabel" for="startTime">Movie Start Time</label>
                                    <input name="startTime" id="startTime"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('startTime','10:00AM')" />
                                </div>

                                <div id=durationDisplay>
                                    <label class="movieLabel" for="duration">Movie Duration</label>
                                    <input id="duration"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('duration','10:00AM')" disabled />
                                </div>

                                <div id=endTimeDisplay>
                                    <label class="movieLabel" for="endTime">Movie End Date </label>
                                    <input id="endTime"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" value="old('endTime','10:00AM')" disabled />
                                </div>

                                <div>



                                </div>


                            </div>
                            <div id="movieSection1-2">
                                <div id=movPhotoContainer>
                                    <img id="movPhoto" src="" alt="Photo">

                                </div>
                            </div>
                        </div>
                        <div id="movieSection2">
                           
                            <button id="btnCancelMovie"  type="submit"
                                class="btn focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cancel</button>
                            <button id="btnSaveMovie" type="submit"
                                class="btn focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </div>

                    </div>
                </form>
                <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="maintenance"
                    role="tabpanel" aria-labelledby="maintenance-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the
                        <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                            content</strong>. Clicking another tab will toggle the visibility of this one for the
                        next.
                        The tab JavaScript swaps classes to control the content visibility and styling.
                    </p>
                    {!! $result !!}
                </div>

            </div>


        </div>




</x-admin-Layout>
@vite(['resources/js/admin/hallTimeSlot/create.js'])

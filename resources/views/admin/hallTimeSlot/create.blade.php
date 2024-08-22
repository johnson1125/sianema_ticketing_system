@vite(['resources/js/admin/hallTimeSlot/create.js', 'resources/css/admin/hallTimeSlot/create.css'])
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
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="movie" role="tabpanel"
                    aria-labelledby="movie-tab">
                    <div id="movieSection1">
                        <div id="movieSection1-1">
                            <div>
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option</label>
                                <select id="movies"
                                    class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                                    <option selected>Choose a movie</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                </select>
                            </div>

                            <div>
                                <label for="startTime">Movie Start Time :</label>
                                <input id="startTime"
                                    class="bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 "
                                    type="text" placeholder="Select a time" value="10:00 AM">
                            </div>

                            <input id="datepicker" type="text">
                        </div>

                        <div id="movieSection1-2">
                            <form class="max-w-[8.5rem] mx-auto">
                                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select time:</label>
                                <div class="flex">
                                    <input type="time" id="time" class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required>
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="maintenance" role="tabpanel"
                    aria-labelledby="maintenance-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                            content</strong>. Clicking another tab will toggle the visibility of this one for the
                        next.
                        The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    {!! $result !!}
                </div>

            </div>


        </div>




</x-admin-Layout>

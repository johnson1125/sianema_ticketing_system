
<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Manage Hall Time Slot')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/admin/hallTimeSlot/index.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div id="container">

        <div id="section1">
            <h6>Manage Hall Timeslot </h6>




            <form id="dateInputForm" action="{{ route('hallTimeSlot.getDate') }}" method="POST">
                @csrf
                <div id="datePicker" class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-actions" name="date" datepicker autoSelectToday datepicker-autoselect-today
                        datepicker-autohide datepicker-format="dd-mm-yyyy" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date" value="{{ old('date', $defaultDate ?? '') }}">
                </div>
                <button id="btnSearch" type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
        </div>
        </form>

        <div id="section2"class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50">
            @foreach ($halls as $hall)
                <div class="timeSlotHeader">
                    <div class="hallName">
                        {{ $hall->hall_id }}
                    </div>
                    <div class="hallType">
                        Big
                    </div>
                    <form action="{{ route('hallTimeSlot.create', ['hallID' => $hall->hall_id, 'date' => $defaultDate]) }}"
                        method="GET" class="inline-block">
                        @csrf
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
                                    <button id="{{ $hallTimeSlot->hall_time_slot_id }}" type="button"
                                        class="timeslots focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    @endsection

    <!-- all js for this page -->
    @push('scripts')
        @vite(['resources/js/admin/hallTimeSlot/index.js'])
    @endpush

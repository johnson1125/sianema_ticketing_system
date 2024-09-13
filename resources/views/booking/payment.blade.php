<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Movie')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/booking/payment.css'])
@endpush

<!-- html for this page -->
@section('content')
<div class="movie-seat-selection-navbar">
    <div class="movie-seat-selection-container">
        <div class="movie-seat-selection-header">
            <div class="booking-progress">
                <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                    <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                        <span
                            class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            1
                        </span>
                        <span>
                            <h3 class="font-medium leading-tight">Select Time Slot</h3>
                            <p class="text-sm">Hei</p>
                        </span>
                    </li>
                    <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                        <span
                            class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">2
                        </span>
                        <span>
                            <h3 class="font-medium leading-tight">Select Seat</h3>
                            <p class="text-sm">HeiHei</p>
                        </span>
                    </li>

                    <li class="flex items-center custom-green text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                        <span class="flex items-center justify-center w-8 h-8 border border-custom-green rounded-full dark:border-green-400">
                            3
                        </span>
                        <span>
                            <h3 class="font-medium leading-tight">Pay Here</h3>
                            <p class="text-sm">HeiHeiHei</p>
                        </span>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
@endsection

<!-- all js for this page -->
@push('scripts')
    {{-- @vite(['']) --}}
@endpush

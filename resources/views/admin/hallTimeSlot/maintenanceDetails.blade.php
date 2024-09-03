<!-- using the master page layout -->
@extends('layouts.masterAdmin')

<!-- The title for this page -->
@section('title', 'Manage Hall Time Slot')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/admin/hallTimeSlot/maintenanceDetails.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div id="container">

        <div id="section1">
            <h6>Maintenance Details</h6>
        </div>

        <div id="section2"class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50">
            {!! $maintenanceData !!}
            <div id=section2-2><a
                    href="{{ route('hallTimeSlot.create', ['hallID' => $hallID, 'date' => $date, 'activeTab' => 'Maintenance']) }}"
                    class="btn focus:outline-none text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Back</a>
            </div>
        </div>

    </div>

@endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/admin/hallTimeSlot/index.js'])
@endpush

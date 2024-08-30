<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Home')

<!-- all css for this page -->
@push('styles')
    {{-- @vite(['']) --}}
@endpush

<!-- html for this page -->
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 font-serif">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- all js for this page -->
@push('scripts')
    {{-- @vite(['']) --}}
@endpush

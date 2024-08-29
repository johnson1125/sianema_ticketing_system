<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Sianema - Test Page')

<!-- all css for this page -->
@push('styles')
@vite(['resources/css/test.css'])
@endpush

<!-- html for this page -->
@section('content')
    <h1>Welcome to the Test Page</h1>
    <p>This is the content of the test page.</p>
    <h2 class="testing">New heading 2</h2>
@endsection

<!-- all js for this page -->
@push('scripts')
@vite(['resources/js/test.js'])
@endpush
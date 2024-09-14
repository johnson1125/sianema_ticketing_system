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
<h1>Payment Successful</h1>
    <h2>Payment Details:</h2>
    <div>
        {!! $payment !!}
    </div>


@endsection

<!-- all js for this page -->
@push('scripts')
    @vite(['resources/js/booking/payment.js'])
@endpush

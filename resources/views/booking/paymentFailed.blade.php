<!-- Author: Kho Ka Jie-->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Payment Failed')

<!-- all css for this page -->
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css">
    @vite(['resources/css/booking/paymentFailed.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div class="failed-container">
        <h2 class="failed-title">Payment Failed!</h2>
        <p class="failed-message">We're sorry, but your payment could not be processed. Please try again.</p>

        <div class="details">
            <h3>Error Details:</h3>
            <div>
                <p class="error-details">Payment information incorrect.</p>
            </div>
        </div>

        <a href="{{ route('movies') }}" class="retry-button">Try Again</a>
        <a href="{{ route('home') }}" class="retry-button">Return to Home</a>
    </div>
@endsection

<!-- all js for this page -->
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
    <script>
        Toastify({
            text: "Payment Failed",
            duration: 3000,
            gravity: "top",
            position: "center",
            backgroundColor: "#eda9a4",
        }).showToast();
    </script>
@endpush

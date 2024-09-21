<!-- Author: Kho Ka Jie-->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Payment Success')

<!-- all css for this page -->
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css">
    @vite(['resources/css/booking/paymentSuccess.css'])
@endpush

<!-- html for this page -->
@section('content')
    <div class="success-container">
        <h2 class="success-title">Payment Successful!</h2>
        <p class="success-message">Thank you for your payment. Your transaction has been processed successfully.</p>

        <div class="details">
            <h3>Payment Details:</h3>
                {!! $payment !!}
        </div>

        <a href="{{ route('home') }}" class="back-button">Return to Home</a>
        <a href="" class="back-button">Transaction History</a>
    </div>
@endsection

<!-- all js for this page -->
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
    <script>
        Toastify({
            text: "Payment Successful",
            duration: 3000,
            gravity: "top",
            position: "center",
            backgroundColor: "#008000",
        }).showToast();
    </script>
@endpush

<!-- Author: Lim Yu Her  -->

<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Transaction History Details')

<!-- all css for this page -->
@push('styles')
    @vite(['resources/css/userManagement/transactionMoreDetails.css'])
@endpush


@section('content')
    <div class="container">
        <div class="card-container p-6 bg-gray-600   rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            {!! $paymentDetails !!}
            <a href="{{ url()->previous() }}"
                class="btn-back focus:outline-none text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Back</a>
        </div>

    </div>
@endsection

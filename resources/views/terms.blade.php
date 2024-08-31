<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Terms and Conditions')

<!-- all css for this page -->
@push('styles')
    {{-- @vite(['']) --}}
@endpush

<!-- html for this page -->
@section('content')
<div class="bg-black text-gray-100">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Terms and Conditions</h1>
        
        <p class="mb-4">
            Welcome to Sianema Ticketing System. By accessing or using our services, you agree to be bound by these Terms and Conditions. Please read them carefully.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">1. Use of Our Services</h2>
        <p class="mb-4">
            You agree to use the Sianema Ticketing System only for lawful purposes and in a way that does not infringe the rights of others or restrict or inhibit their use of the service.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">2. Account Registration</h2>
        <p class="mb-4">
            To access certain features, you may be required to register for an account. You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">3. Ticket Purchase and Pricing</h2>
        <p class="mb-4">
            All ticket purchases are subject to availability and confirmation of the ticket price. We reserve the right to refuse or cancel any order for tickets.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">4. Payment and Refunds</h2>
        <p class="mb-4">
            Payment must be made at the time of purchase. All sales are final, and tickets cannot be refunded or exchanged unless otherwise stated.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">5. Event Changes and Cancellations</h2>
        <p class="mb-4">
            We reserve the right to change event details. In the event of a cancellation, we will notify you and provide a refund or offer alternative arrangements where applicable.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">6. Intellectual Property</h2>
        <p class="mb-4">
            All content, trademarks, and data on the Sianema Ticketing System website are the property of Sianema or its licensors and are protected by intellectual property laws.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">7. Limitation of Liability</h2>
        <p class="mb-4">
            Sianema Ticketing System will not be liable for any direct, indirect, incidental, or consequential damages arising from your use of our services.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">8. Governing Law</h2>
        <p class="mb-4">
            These terms are governed by the laws of the jurisdiction in which Sianema operates. Disputes shall be subject to the exclusive jurisdiction of the courts of that jurisdiction.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">9. Changes to These Terms</h2>
        <p class="mb-4">
            We may update these terms at any time without prior notice. Your continued use of the Sianema Ticketing System after any changes signifies your acceptance of the updated terms.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">10. Contact Us</h2>
        <p class="mb-4">
            If you have any questions about these Terms and Conditions, please contact us at <a href="mailto:terms@sianema.com" class="text-blue-400 underline">terms@sianema.com</a>.
        </p>
    </div>
</div>
@endsection

<!-- all js for this page -->
@push('scripts')
    {{-- @vite(['']) --}}
@endpush

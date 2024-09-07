<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Privacy Policy')

<!-- all css for this page -->
@push('styles')
    {{-- @vite(['']) --}}
@endpush

<!-- html for this page -->
@section('content')
<div class="default-content bg-black text-gray-100">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Privacy Policy</h1>
        
        <p class="mb-4">
            Welcome to Sianema Ticketing System. We value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Information We Collect</h2>

        <h3 class="text-xl font-semibold mt-4">1. Personal Data:</h3>
        <p class="mb-4">
            We may collect personal data such as your name, email address, phone number, billing information, and payment details when you create an account, purchase tickets, or contact us.
        </p>

        <h3 class="text-xl font-semibold mt-4">2. Usage Data:</h3>
        <p class="mb-4">
            We automatically collect information about your interactions with our website and services, including your IP address, browser type, operating system, and browsing behavior.
        </p>

        <h3 class="text-xl font-semibold mt-4">3. Cookies:</h3>
        <p class="mb-4">
            We use cookies to enhance your experience on our site. Cookies are small files stored on your device that help us remember your preferences and gather analytical data.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">How We Use Your Information</h2>
        <p class="mb-4">
            We use the information we collect for the following purposes:
        </p>
        <ul class="list-disc list-inside mb-4">
            <li><strong>Ticket Booking and Delivery:</strong> To process your ticket purchases and deliver them to you.</li>
            <li><strong>Customer Support:</strong> To respond to your inquiries and provide support.</li>
            <li><strong>Marketing:</strong> To send you promotional offers, newsletters, and updates, if you have opted in to receive such communications.</li>
            <li><strong>Site Improvement:</strong> To analyze usage patterns and improve our website and services.</li>
        </ul>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Sharing Your Information</h2>
        <p class="mb-4">
            We do not share your personal information with third parties except in the following circumstances:
        </p>
        <ul class="list-disc list-inside mb-4">
            <li><strong>Service Providers:</strong> We may share your information with third-party service providers who assist us with payment processing, email distribution, and other essential services.</li>
            <li><strong>Legal Requirements:</strong> We may disclose your information if required to do so by law or in response to a court order.</li>
            <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of all or a portion of our assets, your information may be transferred to the acquiring entity.</li>
        </ul>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Security of Your Information</h2>
        <p class="mb-4">
            We implement industry-standard security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Your Rights</h2>
        <p class="mb-4">
            You have the right to access, correct, or delete your personal information at any time. You may also opt out of receiving marketing communications from us by following the unsubscribe instructions provided in our emails.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Changes to This Privacy Policy</h2>
        <p class="mb-4">
            We may update this Privacy Policy from time to time. Any changes will be posted on this page, and we encourage you to review this policy periodically.
        </p>

        <h2 class="text-2xl font-semibold mt-6 mb-2">Contact Us</h2>
        <p class="mb-4">
            If you have any questions or concerns about this Privacy Policy or our data practices, please contact us at <a href="mailto:privacy@sianema.com" class="text-blue-400 underline">privacy@sianema.com</a>.
        </p>
    </div>
</div>
@endsection

<!-- all js for this page -->
@push('scripts')
    {{-- @vite(['']) --}}
@endpush

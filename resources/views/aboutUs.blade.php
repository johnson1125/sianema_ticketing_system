<!-- using the master page layout -->
@extends('layouts.master')

<!-- The title for this page -->
@section('title', 'Privacy Policy')

<!-- all css for this page -->
@push('styles')
@vite(['resources/css/aboutUs.css'])
@endpush

<!-- html for this page -->
@section('content')
<div class="cover-img flex justify-center items-center h-screen">
    <img src="{{ asset('images/au.png') }}" alt="About Us" class="object-contain w-full h-full">
</div>
<div class="default-content bg-black text-gray-100">
    <div class="container mx-auto py-8 px-4">


        <h1 class="text-3xl font-bold mb-4 text-center">Who Are We ?</h1>
        <p class="mb-4">At Sianema Cinemas, the focus extends beyond merely screening movies to providing a complete entertainment experience. Since its inception in 1997, Sianema Cinemas has hosted millions of patrons, offering an extensive array of cinematic encounters in Malaysia.</p>


        <p class="mb-4">Innovation lies at the heart of our operations. We take pride in pioneering initiatives such as introducing Malaysia's first IMAX with Laser Systems and 12-Channel Sound Technology, delivering an unparalleled moviegoing experience. Meanwhile, our Beanie halls offer a cozy retreat with comfortable beanbag pods. At Sianema, innovation knows no bounds, ensuring endless possibilities for our guests.</p>


        <p class="mb-4">Sianema Cinemas serves as a hub where friends, families, and communities gather. We are dedicated to crafting joyful moments and unforgettable memories at the movies. Whether you seek family entertainment, a night out, luxurious indulgence, or an immersive cinematic journey, Sianema Cinemas caters to all your needs.</p>
    </div>
</div>
@endsection

<!-- all js for this page -->
@push('scripts')
{{-- @vite(['']) --}}
@endpush
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sianema - @yield('title', '')</title>

    <!-- Common CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome4.7.0.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.min.css') }}">

    <!-- Load CSS via Vite -->
    @vite(['resources/css/master.css', 'resources/css/app.css'])

    <!-- Additional CSS -->
    @stack('styles')
</head>

<body>
    @include('layouts.navigation')


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Common JS -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

    <!-- Load JS via Vite -->
    @vite(['resources/js/master.js', 'resources/js/app.js'])

    <!-- Additional JS -->
    @stack('scripts')
</body>

</html>
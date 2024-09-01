<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sianema - @yield('title', '')</title>
    
    <!-- Load CSS via Vite -->
    @vite(['resources/css/app.css','resources/css/masterAdmin.css'])
    
    <!-- Additional CSS -->
    @stack('styles')
</head>
<body>
    @include('layouts.adminNavigation')


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Common JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @vite(['resources/js/app.js'])
    <!-- Additional JS -->
    @stack('scripts')
</body>
</html>

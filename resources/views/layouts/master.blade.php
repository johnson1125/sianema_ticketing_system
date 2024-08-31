<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sianema - @yield('title', '')</title>
    
    <!-- Load CSS via Vite -->
    @vite(['resources/css/master.css', 'resources/css/app.css'])
    
    <!-- Additional CSS -->
    @stack('styles')
</head>
<body class="bg-black">
    <!-- Header -->
    <header>
        @include('layouts.navigation')
    </header>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
     @include('layouts.footer')

    <!-- Common JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Load JS via Vite -->
    @vite(['resources/js/master.js', 'resources/js/app.js'])
    
    <!-- Additional JS -->
    @stack('scripts')
</body>
</html>

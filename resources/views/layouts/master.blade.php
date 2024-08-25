<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sianema')</title>
    
    <!-- Load CSS via Vite -->
    @vite(['resources/css/master.css'])
    
    <!-- Additional CSS -->
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <!-- Your navigation links go here -->
        </nav>
        @if(Auth::check())
            <div class="user-profile-dropdown">
                <!-- User profile dropdown -->
            </div>
        @else
            <a href="{{ route('login') }}" class="login-button">Login</a>
        @endif
    </header>

    <!-- Main Content -->
    <div class="content">
        <h1>Testing</h1>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <!-- Your footer content goes here -->
    </footer>

    <!-- Common JS -->
    <script src="{{ asset('js/common.js') }}"></script>

    <!-- Load JS via Vite -->
    @vite(['resources/js/master.js'])
    
    <!-- Additional JS -->
    @stack('scripts')
</body>
</html>

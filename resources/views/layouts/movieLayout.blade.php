<!DOCTYPE html>
<html>
<head>
    <title>Laravel Movie Module</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5 bg-white">
        <h1 class=" text-xl text-center">Nav bar</h1>
    </div>
    <div class="container mx-auto mt-5">
        @yield('content')
    </div>
</body>
</html>

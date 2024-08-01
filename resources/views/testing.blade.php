<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tailwind CSS Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
    <!-- Must put this-->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">My Website</h1>
            <nav>
                <a href="#" class="text-white hover:text-gray-200 px-4">Home</a>
                <a href="#" class="text-white hover:text-gray-200 px-4">About</a>
                <a href="#" class="text-white hover:text-gray-200 px-4">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-3xl font-semibold mb-4">Welcome to My Website!</h2>
            <p class="text-gray-700 font-bold text-base">This is a simple webpage using Tailwind CSS. You can customize
                the content and styling as needed. Tailwind provides a utility-first approach to CSS, allowing for rapid
                design and development.</p>
            <div class="mt-6">
                <a href="#" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More</a>
            </div>
        </div>
    </main>


    <div
        class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl">
        <div class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
        <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
        <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/mockup-2-light.png"
                class="dark:hidden w-[272px] h-[572px]" alt="">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/mockup-2-dark.png"
                class="hidden dark:block w-[272px] h-[572px]" alt="">
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>

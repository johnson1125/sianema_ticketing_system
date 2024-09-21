<!-- Scripts and css used (put them in head element of master.blade.php) -->
<!-- 
'resources/js/layout/navigation.js'
'resources/css/navigation.css' 
-->

<!-- Navigation bar -->

<nav class="bg-black">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-sianema-logo-dark class="block h-9 w-auto fill-current text-gray-200" />
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @if (Auth::user()->profile_photo)
                    <img class="w-8 h-8 rounded-full" src="{{ route('profile.photo', ['id' => Auth::user()->id]) }}" alt="{{ Auth::user()->name }}">
                @else
                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/default-profile-pic.png') }}" alt="user photo">
                @endif
            </button>
            <!-- Dropdown menu -->

            <div class="z-50 hidden my-4 text-base list-none divide-y rounded-lg shadow bg-zinc-800 divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm  truncate text-gray-400">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('profile.edit', ['name' => Auth::user()->name, 'role' => Auth::user()->role]) }}" class="block px-4 py-2 text-sm hover:bg-gray-600 hover:text-sianema-green text-gray-200 hover:text-white">Edit Profile</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role === 'user')
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600 hover:text-sianema-green text-gray-200 hover:text-white">Transaction History</a>
                    </li>
                    @endif
                    <li>
                        <!-- <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm hover:bg-gray-600 hover:text-sianema-green text-gray-200 hover:text-white">Sign out</a> -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-logout w-full text-left block px-4 py-2 text-sm hover:bg-gray-600 hover:text-sianema-green text-gray-200 hover:text-white">
                                Sign out
                            </button>
                        </form>
                    </li>
                </ul>

            </div>
            @else
            <a href="{{ route('login') }}"><button type="button" class="text-white focus:ring-4 focus:outline-none font-bold rounded-lg text-sm px-4 py-2 text-center bg-button-green hover:bg-white hover:text-button-green focus:ring-sianema-green">LOG IN</button></a>
            @endauth
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-zinc-800 md:bg-black border-black">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 rounded md:p-0 text-white {{ Route::is('home') ? 'bg-button-green md:bg-transparent  md:text-sianema-green' : 'md:hover:text-sianema-green hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700' }}" aria-current="{{ Route::is('home') ? 'page' : 'false' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('movies') }}" class="block py-2 px-3 rounded md:p-0 text-white {{ Route::is('movies') ? 'bg-button-green md:bg-transparent  md:text-sianema-green' : 'md:hover:text-sianema-green hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700' }}" aria-current="{{ Route::is('movies') ? 'page' : 'false' }}">Movies</a>
                </li>
                <li>
                    <a href="{{ route('aboutUs') }}" class="block py-2 px-3 rounded md:p-0 text-white {{ Route::is('aboutUs') ? 'bg-button-green md:bg-transparent  md:text-sianema-green' : 'md:hover:text-sianema-green hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700' }}" aria-current="{{ Route::is('aboutUs') ? 'page' : 'false' }}">About Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <nav class="bg-black">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-sianema-logo-dark class="block h-9 w-auto fill-current text-gray-200" />
        </a>
        <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul class="flex flex-col font-medium mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-transparent border-gray-700">
                <li>
                    <a href="#" class="block py-2 px-3 md:p-0 text-white rounded md:text-blue-500 bg-blue-600 md:bg-transparent" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 md:p-0 rounded md:border-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 md:p-0 rounded md:border-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 md:p-0 rounded md:border-0 text-white md:hover:text-blue-500 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
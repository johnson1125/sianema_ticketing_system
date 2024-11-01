<!-- Scripts -->
@vite(['resources/js/layout/navigation.js', 'resources/css/adminNavigation.css'])
<!-- Navigation bar -->
<nav id="navbar" class=" bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @can('manage timeslots')
                    <a href="{{ route('hallTimeSlot') }}">
                        <x-sianema-logo-dark class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                    @else 
                        <x-sianema-logo-dark class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    @endcan
                    
                </div>

                <!-- Navigation Links -->
                <div id="navLink" class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex text-white">
                    @can('manage timeslots')
                    <x-nav-link :href="route('hallTimeSlot')" :active="request()->route() && request()->route()->getController() instanceof \App\Http\Controllers\HallTimeSlotController ? true : false">
                        {{ __('Hall TimeSlot') }}
                    </x-nav-link>
                    @endcan
                    @can('manage halls')
                    <x-nav-link :href="route('manage.hall.index')" :active="request()->route() && request()->route()->getController() instanceof \App\Http\Controllers\HallController ? true : false">
                        {{ __('Hall') }}
                    </x-nav-link>
                    @endcan
                    @can('manage movies')
                    <x-nav-link :href="route('movies.index')" :active="request()->route() && request()->route()->getController() instanceof \App\Http\Controllers\MovieController ? true : false">
                        {{ __('Movie') }}
                    </x-nav-link>
                    @endcan
                    @role('Root')
                    <x-nav-link :href="route('adminManagement')" :active="request()->route() && request()->route()->getController() instanceof \App\Http\Controllers\AdminController ? true : false">
                        {{ __('Manage Admin') }}
                    </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <!-- <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button> -->
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false">
                            <span class="sr-only">Open user menu</span>
                            @if (Auth::user()->profile_photo)
                            <img class="w-8 h-8 rounded-full" src="{{ route('profile.photo', ['userId' => Auth::user()->id]) }}" alt="{{ Auth::user()->name }}">
                            @else
                            <img class="w-8 h-8 rounded-full" src="{{ asset('images/default-profile-pic.png') }}" alt="user photo">
                            @endif
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="divide-y divide-gray-300">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="navlinks">
                                <x-dropdown-link :href="route('profile.edit', [
                                    'name' => auth()->user()->name,
                                    'role' => auth()->user()->hasRole('Admin') ? 'Admin' : 'User',
                                ])">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button id="hamburger"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="menu-open" class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="menu-close" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="responsive-menu" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                @if (Auth::user()->profile_photo)
                <img class="mb-2 w-8 h-8 rounded-full" src="{{ route('profile.photo', ['userId' => Auth::user()->id]) }}" alt="{{ Auth::user()->name }}">
                @else
                <img class="mb-2 w-8 h-8 rounded-full" src="{{ asset('images/default-profile-pic.png') }}" alt="user photo">
                @endif
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit', ['name' => auth()->user()->name, 'role' => auth()->user()->hasRole('Admin') ? 'Admin' : 'User'])">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
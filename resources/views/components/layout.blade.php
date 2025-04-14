<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="{{ asset('images/icon.svg') }}" alt="Job-Board-Icon">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')">Jobs board</x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')">Log in</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest
                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                   
                                <button type="submit"
                                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded leading-5 hover:text-gray-400 hover:bg-black focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-white active:text-red-700 transition ease-in-out duration-150 dark:bg-white dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800">
                                    log out
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-red-700 p-2 text-white hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu"
                            aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, initially hidden -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <a href="/" class="bg-white text-gray-600 hover:bg-white hover:text-red-700 block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            @auth
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ Auth::user()->name }} ({{ Auth::user()->role }})
                </h1>
            @else
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Guest
                </h1>
            @endauth
            <x-button href="/jobs/create">
                Create Job
            </x-button>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</div>
@stack('scripts')
<!-- Mobile Menu Toggle Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the mobile menu button and the mobile menu element
        const mobileMenuButton = document.querySelector("button[aria-controls='mobile-menu']");
        const mobileMenu = document.getElementById("mobile-menu");

        // When the button is clicked, toggle the "hidden" class on the mobile menu
        mobileMenuButton.addEventListener("click", function() {
            mobileMenu.classList.toggle("hidden");
        });
    });
</script>
</body>
</html>

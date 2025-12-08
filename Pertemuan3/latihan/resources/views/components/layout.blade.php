<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="h-full font-sans antialiased text-gray-900 bg-gray-100">

    <div class="min-h-full flex flex-col">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="/"
                                class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-500 hover:to-cyan-400">
                                MyApp
                            </a>
                        </div>
                        
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="/" class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Home</a>
                                <a href="/about" class="{{ request()->is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">About</a>
                                <a href="/blog" class="{{ request()->is('blog*') || request()->is('posts*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Blog</a>
                                <a href="/categories" class="{{ request()->is('categories*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Categories</a>
                                <a href="/contact" class="{{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                            </div>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            
                            @auth
                                {{-- JIKA SUDAH LOGIN --}}
                                <div class="relative ml-3 flex items-center gap-4">
                                    <div class="text-gray-300 text-sm font-medium">
                                        Hi, {{ auth()->user()->name }}
                                    </div>
                                    
                                    {{-- Tombol Logout --}}
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            @else
                                {{-- JIKA BELUM LOGIN (GUEST) --}}
                                <a href="/login" class="{{ request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                                    Login
                                </a>
                            @endauth

                        </div>
                    </div>

                    <div class="-mr-2 flex md:hidden">
                        <button type="button" id="mobile-menu-button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="hidden md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <a href="/" class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Home</a>
                    <a href="/about" class="{{ request()->is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">About</a>
                    <a href="/blog" class="{{ request()->is('blog*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Blog</a>
                    <a href="/categories" class="{{ request()->is('categories') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Categories</a>
                    <a href="/contact" class="{{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Contact</a>
                </div>
                
                <div class="border-t border-gray-700 pb-3 pt-4">
                    @auth
                        {{-- Mobile Menu: User Logged In --}}
                        <div class="flex items-center px-5">
                            <div class="shrink-0">
                                <img class="size-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random" alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium leading-none text-white">{{ auth()->user()->name }}</div>
                                <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                             <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</button>
                            </form>
                        </div>
                    @else
                        {{-- Mobile Menu: Guest --}}
                        <div class="mt-3 space-y-1 px-2">
                            <a href="/login" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ $title ?? 'My App' }}
                </h1>
            </div>
        </header>

        <main class="flex-grow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <footer class="bg-gray-800 text-white py-6 border-t border-gray-700 mt-auto">
            <div class="container mx-auto text-center">
                <p class="text-sm">
                    &copy; 2025 Dian. All rights reserved.
                </p>
            </div>
        </footer>

    </div>

    {{-- Script untuk Toggle Mobile Menu --}}
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
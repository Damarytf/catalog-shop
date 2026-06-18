<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Katalog' }} - {{ \App\Models\Setting::get('store_name', 'Toko Bisnis Digital') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ mobileMenuOpen: false }">
    
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('catalog.index') }}" class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-tr from-violet-600 to-indigo-500 rounded-xl flex items-center justify-center text-white font-black text-xl shadow-lg shadow-indigo-200 rotate-3 hover:rotate-0 transition-transform duration-300">
                        T
                    </div>
                        <span class="font-bold text-xl text-gray-900 hidden sm:block">
                            {{ \App\Models\Setting::get('store_name', 'Toko Bisnis Digital') }}
                        </span>
                    </a>
                </div>
                
                <div class="hidden sm:flex sm:items-center sm:gap-8">
                     <a href="{{ route('catalog.index') }}" class="relative text-sm font-semibold text-gray-600 hover:text-indigo-600 transition-colors py-2 group">
                         Katalog
                      <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                         </a>
                         <a href="{{ route('pages.contact') }}" class="relative text-sm font-semibold text-gray-600 hover:text-indigo-600 transition-colors py-2 group">
                         Kontak
                         <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden gap-4">
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                        </svg>
                        <span x-show="$store.cart.totalItems > 0" x-text="$store.cart.totalItems" x-cloak class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-primary-600 rounded-full"></span>
                    </a>
                    
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 hover:text-gray-900 focus:outline-none p-2">
                        <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak x-collapse class="sm:hidden bg-white border-t border-gray-100">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="{{ route('catalog.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Katalog</a>
                <a href="{{ route('pages.contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-primary-50">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 mt-24 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8 border-b border-gray-50 pb-8">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-gradient-to-tr from-violet-600 to-indigo-500 rounded-xl flex items-center justify-center text-white font-bold text-base shadow-md">
                    T
                </div>
                <span class="font-bold text-lg bg-clip-text text-transparent bg-gradient-to-r from-gray-950 to-gray-700">
                    {{ \App\Models\Setting::get('store_name', 'Toko Bisnis Digital') }}
                </span>
            </div>
            
            <div class="flex gap-6 text-sm text-gray-500">
                <a href="{{ route('catalog.index') }}" class="hover:text-indigo-600 transition-colors">Belanja</a>
                <a href="#" class="hover:text-indigo-600 transition-colors">Syarat & Ketentuan</a>
                <a href="{{ route('pages.contact') }}" class="hover:text-indigo-600 transition-colors">Bantuan</a>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-between items-center pt-8 text-xs text-gray-400 gap-4">
            <p>&copy; {{ date('Y') }} {{ \App\Models\Setting::get('store_name', 'Toko Bisnis Digital') }}.</p>
            <p class="font-medium text-gray-400/80">All rights reserved.</p>
        </div>
    </div>
</footer>

    <!-- Toast Notification (Alpine.js) -->
    <div x-data="{ show: false, message: '' }" 
         @notify.window="message = $event.detail.message; show = true; setTimeout(() => show = false, 3000)"
         x-show="show" 
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-y-10 opacity-0 sm:translate-y-0 sm:translate-x-10"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed bottom-4 right-4 z-50 sm:top-20 sm:bottom-auto sm:right-6">
        <div class="bg-gray-900 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-primary-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium text-sm" x-text="message"></span>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                },
            },
        }
    </script>
    <style>
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        .btn-hover-effect {
            transition: all 0.3s ease;
        }
        .btn-hover-effect:hover {
            transform: translateY(-1px);
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-gradient-to-r from-primary-600 to-primary-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('profiles.index') }}" class="flex-shrink-0 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-xl font-bold text-white">SaveSmart</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="flex space-x-4">
                        @auth
                            <a href="{{ route('profiles.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-primary-500 transition-colors">
                                Accueil
                            </a>
                            
                            @if (session('current_profile') && (request()->routeIs('home') || request()->routeIs('profilePesronnel')|| request()->routeIs('savings_goals.index')))
                                <a href="{{ route('profilePesronnel', session('current_profile')) }}" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-primary-500 transition-colors">
                                    Profil personnel
                                </a>
                                <a href="{{ route('home', session('current_profile')) }}" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-primary-500 transition-colors">
                                    Tableau de bord
                                </a>
                            @endif
                            
                            <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                                @csrf
                                <button type="submit" class="flex items-center px-3 py-1.5 rounded-lg border-2 border-white text-sm font-medium text-white hover:bg-white hover:text-primary-600 transition-colors">
                                    <span>{{ session("CompteName") }}</span>
                                    <i class="bi bi-box-arrow-right ml-2"></i>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-primary-500 transition-colors">
                                Se connecter
                            </a>
                            <a href="{{ route('register') }}" class="px-3 py-1.5 rounded-lg border-2 border-white text-sm font-medium text-white hover:bg-white hover:text-primary-600 transition-colors">
                                S'inscrire
                            </a>
                        @endauth
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-primary-500 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-primary-700">
                @auth
                    <a href="{{ route('profiles.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-primary-500">
                        Accueil
                    </a>
                    
                    @if (session('current_profile') && (request()->routeIs('home') || request()->routeIs('profilePesronnel')|| request()->routeIs('savings_goals.index')))
                        <a href="{{ route('profilePesronnel', session('current_profile')) }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-primary-500">
                            Profil personnel
                        </a>
                        <a href="{{ route('home', session('current_profile')) }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-primary-500">
                            Tableau de bord
                        </a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="block px-3 py-2">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-left rounded-md text-base font-medium text-white hover:bg-primary-500">
                            <span>{{ session("CompteName") }}</span>
                            <i class="bi bi-box-arrow-right ml-2"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-primary-500">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-primary-500">
                        S'inscrire
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow py-8 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-8 md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2 space-x-6">
                    <a href="#" class="text-gray-400 hover:text-primary-600">
                        <span class="sr-only">Facebook</span>
                        <i class="bi bi-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary-600">
                        <span class="sr-only">Instagram</span>
                        <i class="bi bi-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary-600">
                        <span class="sr-only">Twitter</span>
                        <i class="bi bi-twitter text-xl"></i>
                    </a>
                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-500">
                        &copy; 2023 SaveSmart. Tous droits réservés.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
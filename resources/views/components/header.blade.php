<nav class="bg-black shadow-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo and Brand Name -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/white_on_trans.png') }}" class="h-14 w-14" alt="Save Smart Logo">
                <span class="text-white text-xl font-bold">Save Smart</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:block">
                <div class="flex space-x-4">
                    @if(session()->has('user'))
                        @if(session()->has('user_id'))
                            <a href="/profile/{{ session('user_id') }}" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700 transition duration-300">Profile</a>
                            <a href="{{ route('home') }}" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700 transition duration-300">Home</a>
                            <a href="/userDashboard" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700 transition duration-300">All Profiles</a>
                            <a href="/logout" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-red-600 transition duration-300">Logout</a>
                        @else
                            <a href="/logout" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-red-600 transition duration-300">Logout</a>
                            <a href="/userDashboard" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700 transition duration-300">All Profiles</a>
                        @endif
                    @else
                        <a href="/login" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700 transition duration-300">Sign In</a>
                        <a href="/register" class="text-white px-3 py-2 rounded-md text-md font-medium hover:bg-gray-700 transition duration-300">Sign Up</a>
                    @endif
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white hover:bg-gray-700 p-2 rounded-md transition duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by Default) -->
    <div class="hidden sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @if(session()->has('user'))
                @if(session()->has('user_id'))
                    <a href="/profile/{{ session('user_id') }}" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700 transition duration-300">Profile</a>
                    <a href="{{ route('home') }}" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700 transition duration-300">Home</a>
                    <a href="/userDashboard" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700 transition duration-300">All Profiles</a>
                    <a href="/logout" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-red-600 transition duration-300">Logout</a>
                @else
                    <a href="/logout" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-red-600 transition duration-300">Logout</a>
                    <a href="/userDashboard" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700 transition duration-300">All Profiles</a>
                @endif
            @else
                <a href="/login" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700 transition duration-300">Sign In</a>
                <a href="/register" class="block text-white px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700 transition duration-300">Sign Up</a>
            @endif
        </div>
    </div>
</nav>

<script>
    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
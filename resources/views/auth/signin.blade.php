@extends('base')

@section('main')
    <section class="relative min-h-screen bg-gray-100">

        <!-- Login Form (Centered) -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Welcome Back to SaveSmart</h1>
                <form method="post" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                        <input
                            type="text"
                            name="email"
                            id="email"
                            placeholder="Enter your email"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember-me"
                                name="remember-me"
                                type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            />
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>
                        <div>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Sign in
                    </button>

                    <!-- Register Link -->
                    <p class="text-sm text-gray-600 text-center mt-6">
                        Don't have an account?
                        <a href="/register" class="font-medium text-blue-600 hover:underline">Register here</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
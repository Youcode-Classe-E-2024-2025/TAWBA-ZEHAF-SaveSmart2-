@extends('base')

@section('main')
    <section class="relative min-h-screen bg-gray-100">

        <!-- Registration Form (Centered) -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Create Your SaveSmart Account</h1>
                <form action="{{ route('register') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf

                    <!-- First Name Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="firstName">First Name</label>
                        <input
                            type="text"
                            name="firstName"
                            id="firstName"
                            placeholder="John"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                        @error('firstName')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Last Name Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="lastName">Last Name</label>
                        <input
                            type="text"
                            name="lastName"
                            id="lastName"
                            placeholder="Doe"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                        @error('lastName')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="example@example.com"
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

                    <!-- Phone Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="phone">Phone</label>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            placeholder="123-456-7890"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="image">Upload Picture</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Sign Up
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
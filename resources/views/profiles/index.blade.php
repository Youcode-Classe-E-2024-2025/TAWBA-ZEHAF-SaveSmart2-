@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-600">Vos Profils</h2>
            <p class="mt-2 text-gray-600">Sélectionnez un profil pour accéder à votre tableau de bord</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="rounded-xl bg-green-50 p-4 mb-8 border-l-4 border-green-500 animate-fade-in">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="this.parentElement.parentElement.parentElement.parentElement.style.display='none'">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Profiles Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 animate-fade-in">
            @foreach ($profiles as $profile)
            <div class="relative group">
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all p-6 flex flex-col items-center">
                    <a href="{{ route('home', $profile->id) }}" class="text-center">
                        <div class="relative mb-3">
                            <img 
                                src="https://picsum.photos/seed/{{ $profile->id }}/200/200" 
                                alt="{{ $profile->name }}" 
                                class="w-24 h-24 rounded-full object-cover border-4 border-primary-100 group-hover:border-primary-300 transition-all"
                            >
                            <div class="absolute inset-0 bg-primary-600 bg-opacity-0 rounded-full group-hover:bg-opacity-10 transition-all"></div>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition-colors">
                            {{ $profile->name }}
                        </h3>
                    </a>
                    
                    <!-- Action buttons -->
                    <div class="mt-4 flex space-x-2">
                        <a 
                            href="{{ route('profiles.edit', $profile->id) }}" 
                            class="p-2 rounded-lg text-gray-500 hover:text-primary-600 hover:bg-primary-50 transition-colors"
                            title="Modifier"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="p-2 rounded-lg text-gray-500 hover:text-red-600 hover:bg-red-50 transition-colors"
                                title="Supprimer"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce profil ?')"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            
            <!-- Add New Profile Card -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all p-6 flex flex-col items-center justify-center h-full">
                <a 
                    href="{{ route('profiles.create') }}" 
                    class="flex flex-col items-center text-center group"
                >
                    <div class="w-24 h-24 rounded-full bg-primary-50 flex items-center justify-center mb-3 group-hover:bg-primary-100 transition-colors">
                        <i class="bi bi-plus-lg text-4xl text-primary-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 group-hover:text-primary-600 transition-colors">
                        Nouveau profil
                    </h3>
                </a>
            </div>
        </div>
        
        <!-- Empty State -->
        @if(count($profiles) === 0)
        <div class="bg-white rounded-xl shadow-md p-12 text-center animate-fade-in">
            <div class="mx-auto w-24 h-24 rounded-full bg-primary-50 flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900">Aucun profil trouvé</h3>
            <p class="mt-2 text-gray-600 max-w-md mx-auto">
                Créez votre premier profil pour commencer à gérer vos finances personnelles.
            </p>
            <div class="mt-6">
                <a 
                    href="{{ route('profiles.create') }}" 
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all"
                >
                    <i class="bi bi-plus-lg mr-2"></i>
                    Créer un profil
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Animation */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    /* Primary color variables */
    :root {
        --color-primary-50: #f0f9ff;
        --color-primary-100: #e0f2fe;
        --color-primary-200: #bae6fd;
        --color-primary-300: #7dd3fc;
        --color-primary-400: #38bdf8;
        --color-primary-500: #0ea5e9;
        --color-primary-600: #0284c7;
        --color-primary-700: #0369a1;
        --color-primary-800: #075985;
        --color-primary-900: #0c4a6e;
        --color-primary-950: #082f49;
    }
    /* Apply primary colors to Tailwind classes */
    .bg-primary-50 {
        background-color: var(--color-primary-50);
    }
    .bg-primary-100 {
        background-color: var(--color-primary-100);
    }
    .bg-primary-600 {
        background-color: var(--color-primary-600);
    }
    .hover\:bg-primary-50:hover {
        background-color: var(--color-primary-50);
    }
    .hover\:bg-primary-100:hover {
        background-color: var(--color-primary-100);
    }
    .hover\:bg-primary-700:hover {
        background-color: var(--color-primary-700);
    }
    .text-primary-600 {
        color: var(--color-primary-600);
    }
    .hover\:text-primary-600:hover {
        color: var(--color-primary-600);
    }
    .border-primary-100 {
        border-color: var(--color-primary-100);
    }
    .hover\:border-primary-300:hover {
        border-color: var(--color-primary-300);
    }
    .focus\:ring-primary-500:focus {
        --tw-ring-color: var(--color-primary-500);
    }
</style>
@endsection
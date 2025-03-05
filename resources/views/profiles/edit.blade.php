@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('profiles.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Tableau de bord
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('profiles.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors md:ml-2">Profils</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Modifier le profil</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Form Card -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden animate-fade-in">
            <div class="px-6 py-5 bg-gradient-to-r from-primary-600 to-primary-700">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-white rounded-md p-2">
                        <svg class="h-6 w-6 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h2 class="text-xl font-bold leading-7 text-white">
                            Modifier le profil: {{ $profile->name }}
                        </h2>
                        <p class="mt-1 text-sm text-white/80">
                            Mettez à jour les informations de votre profil
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-6">
                @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Veuillez corriger les erreurs suivantes :</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <form action="{{ route('profiles.update', $profile->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nom du profil
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="form-input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all" 
                                value="{{ old('name', $profile->name) }}" 
                                required
                            >
                        </div>
                        <p class="mt-1 text-xs text-gray-500">
                            Choisissez un nom descriptif pour identifier facilement ce profil
                        </p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Mot de passe du profil
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all" 
                                placeholder="Laissez vide pour conserver le mot de passe actuel"
                            >
                        </div>
                        <p class="mt-1 text-xs text-gray-500">
                            Si vous ne voulez pas modifier le mot de passe, laissez ce champ vide
                        </p>
                    </div>
                    
                    <div class="pt-6 flex items-center justify-between border-t border-gray-200">
                        <a href="{{ route('profiles.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Annuler
                        </a>
                        <button 
                            type="submit" 
                            class="btn-hover-effect inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tips Card -->
        <div class="mt-6 bg-white shadow-lg rounded-xl overflow-hidden animate-fade-in">
            <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Information importante</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                Si vous modifiez le mot de passe de ce profil, assurez-vous de le communiquer aux personnes qui y ont accès.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Form input focus styles */
    .form-input-focus {
        transition: all 0.3s ease;
    }
    .form-input-focus:focus {
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
        border-color: #0ea5e9;
    }
    /* Button hover effect */
    .btn-hover-effect {
        transition: all 0.3s ease;
    }
    .btn-hover-effect:hover {
        transform: translateY(-1px);
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
    .bg-primary-100 {
        background-color: var(--color-primary-100);
    }
    .bg-primary-600 {
        background-color: var(--color-primary-600);
    }
    .bg-primary-700 {
        background-color: var(--color-primary-700);
    }
    .from-primary-600 {
        --tw-gradient-from: var(--color-primary-600);
    }
    .to-primary-700 {
        --tw-gradient-to: var(--color-primary-700);
    }
    .hover\:bg-primary-700:hover {
        background-color: var(--color-primary-700);
    }
    .text-primary-500 {
        color: var(--color-primary-500);
    }
    .text-primary-600 {
        color: var(--color-primary-600);
    }
    .hover\:text-primary-600:hover {
        color: var(--color-primary-600);
    }
    .focus\:ring-primary-500:focus {
        --tw-ring-color: var(--color-primary-500);
    }
    .focus\:border-primary-500:focus {
        border-color: var(--color-primary-500);
    }
    .border-primary-500 {
        border-color: var(--color-primary-500);
    }
    /* Animation */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
</style>
@endsection
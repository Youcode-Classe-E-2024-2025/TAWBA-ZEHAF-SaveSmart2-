@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-violet-50 via-indigo-50 to-blue-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header with enhanced styling -->
        <div class="mb-10 animate-fade-in">
            <div class="flex items-center mb-3">
                <div class="bg-gradient-to-r from-violet-600 to-indigo-600 rounded-lg p-2 mr-3 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-700 to-indigo-700">Vos Profils</h2>
            </div>
            <p class="mt-2 text-gray-600 pl-12 max-w-2xl">Sélectionnez un profil pour accéder à votre tableau de bord et gérer vos finances personnelles</p>
        </div>

        <!-- Enhanced Success Message -->
        @if(session('success'))
            <div class="rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 p-4 mb-8 border-l-4 border-emerald-500 shadow-sm animate-slide-in">
                <div class="flex">
                    <div class="flex-shrink-0 bg-emerald-100 rounded-full p-1">
                        <svg class="h-5 w-5 text-emerald-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-emerald-800">
                            {{ session('success') }}
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="inline-flex rounded-md p-1.5 text-emerald-500 hover:bg-emerald-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all" onclick="this.parentElement.parentElement.parentElement.parentElement.style.display='none'">
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

        <!-- Enhanced Profiles Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 animate-fade-in">
            @foreach ($profiles as $profile)
            <div class="relative group animate-fade-in" style="animation-delay: {{ $loop->index * 0.05 }}s">
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col items-center transform hover:-translate-y-1">
                    <a href="{{ route('home', $profile->id) }}" class="text-center">
                        <div class="relative mb-4 overflow-hidden">
                            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-violet-100 to-indigo-100 p-1">
                                <img 
                                    src="https://picsum.photos/seed/{{ $profile->id }}/200/200" 
                                    alt="{{ $profile->name }}" 
                                    class="w-full h-full rounded-full object-cover border-2 border-white group-hover:scale-105 transition-all duration-300"
                                >
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-br from-violet-600 to-indigo-600 opacity-0 rounded-full group-hover:opacity-10 transition-opacity duration-300"></div>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-indigo-700 transition-colors">
                            {{ $profile->name }}
                        </h3>
                    </a>
                    
                    <!-- Enhanced Action buttons -->
                    <div class="mt-5 flex space-x-2">
                        <a 
                            href="{{ route('profiles.edit', $profile->id) }}" 
                            class="p-2 rounded-lg text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 transition-all duration-200"
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
                                class="p-2 rounded-lg text-gray-500 hover:text-rose-600 hover:bg-rose-50 transition-all duration-200"
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
            
            <!-- Enhanced Add New Profile Card -->
            <div class="animate-fade-in" style="animation-delay: {{ count($profiles) * 0.05 }}s">
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col items-center justify-center h-full transform hover:-translate-y-1">
                    <a 
                        href="{{ route('profiles.create') }}" 
                        class="flex flex-col items-center text-center group"
                    >
                        <div class="w-24 h-24 rounded-full bg-gradient-to-br from-violet-100 to-indigo-100 flex items-center justify-center mb-4 group-hover:from-violet-200 group-hover:to-indigo-200 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-indigo-700 transition-colors">
                            Nouveau profil
                        </h3>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Enhanced Empty State -->
        @if(count($profiles) === 0)
        <div class="bg-white rounded-2xl shadow-md p-12 text-center animate-fade-in">
            <div class="mx-auto w-24 h-24 rounded-full bg-gradient-to-br from-violet-100 to-indigo-100 flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                    class="inline-flex items-center px-5 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Créer un profil
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Enhanced Animations */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideIn {
        0% { opacity: 0; transform: translateX(-20px); }
        100% { opacity: 1; transform: translateX(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    .animate-slide-in {
        animation: slideIn 0.5s ease-out;
    }
    
    /* Modern color palette - Violet/Indigo theme */
    :root {
        --color-primary-50: #f5f3ff;
        --color-primary-100: #ede9fe;
        --color-primary-200: #ddd6fe;
        --color-primary-300: #c4b5fd;
        --color-primary-400: #a78bfa;
        --color-primary-500: #8b5cf6;
        --color-primary-600: #7c3aed;
        --color-primary-700: #6d28d9;
        --color-primary-800: #5b21b6;
        --color-primary-900: #4c1d95;
        --color-primary-950: #2e1065;
        
        --color-secondary-50: #eef2ff;
        --color-secondary-100: #e0e7ff;
        --color-secondary-200: #c7d2fe;
        --color-secondary-300: #a5b4fc;
        --color-secondary-400: #818cf8;
        --color-secondary-500: #6366f1;
        --color-secondary-600: #4f46e5;
        --color-secondary-700: #4338ca;
        --color-secondary-800: #3730a3;
        --color-secondary-900: #312e81;
        --color-secondary-950: #1e1b4b;
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
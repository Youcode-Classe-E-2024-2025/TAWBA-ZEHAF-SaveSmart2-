@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <a href="{{ route('profiles.index') }}" class="flex items-center justify-center w-9 h-9 rounded-full bg-gradient-to-r from-violet-500 to-purple-600 text-white shadow-md hover:shadow-lg transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                    </a>
                    <div class="flex items-center">
                        <div class="h-8 w-8 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <a href="{{ route('profiles.index') }}" class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 font-medium text-sm hover:bg-slate-200 transition-colors">
                            Profils
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="h-8 w-8 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <span class="px-4 py-2 rounded-lg bg-purple-100 text-purple-700 font-medium text-sm border-2 border-purple-200">
                            Nouveau profil
                        </span>
                    </div>
                </div>
                
                <a href="{{ route('profiles.index') }}" class="text-sm text-slate-600 hover:text-purple-600 flex items-center group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Retour
                </a>
            </div>
        </div>
        <!-- Form Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-100 animate-slide-up">
            <div class="px-6 py-6 bg-gradient-to-r from-purple-600 to-indigo-700">
                <h2 class="text-2xl font-bold leading-7 text-white">
                    Créer un Profil
                </h2>
                <p class="mt-1 text-sm text-white/90">
                    Créez un nouveau profil pour gérer vos finances
                </p>
            </div>
            <div class="px-8 py-8">
                <form action="{{ route('profiles.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                            Nom du profil
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="input-field block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl text-slate-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" 
                                placeholder="Ex: Budget Personnel, Épargne Famille..." 
                                required
                            >
                        </div>
                        <p class="mt-2 text-xs text-slate-500">
                            Choisissez un nom descriptif pour identifier facilement ce profil
                        </p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                            Mot de passe du profil
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="input-field block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl text-slate-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" 
                                placeholder="Entrez un mot de passe sécurisé" 
                                required
                            >
                        </div>
                        <p class="mt-2 text-xs text-slate-500">
                            Le mot de passe doit contenir au moins 8 caractères
                        </p>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">
                            Confirmer le mot de passe
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                class="input-field block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl text-slate-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" 
                                placeholder="Confirmez le mot de passe" 
                                required
                            >
                        </div>
                    </div>

                    <div class="pt-6 flex items-center justify-end space-x-4 border-t border-slate-200">
                        <a href="{{ route('profiles.index') }}" class="button-secondary inline-flex items-center px-5 py-2.5 border border-slate-300 rounded-xl text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Annuler
                        </a>
                        <button 
                            type="submit" 
                            class="button-primary inline-flex items-center px-5 py-2.5 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Créer le profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
<style>
    /* Input field styles */
    .input-field {
        transition: all 0.3s ease;
    }
    .input-field:focus {
        box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.2);
    }
    
    /* Button styles */
    .button-primary {
        transition: all 0.3s ease;
    }
    .button-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(147, 51, 234, 0.25);
    }
    .button-secondary {
        transition: all 0.3s ease;
    }
    .button-secondary:hover {
        transform: translateY(-2px);
    }
    
    /* Animations */
    @keyframes slideUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-up {
        animation: slideUp 0.6s ease-out forwards;
    }
    .animation-delay-300 {
        animation-delay: 0.3s;
    }
</style>
@endsection
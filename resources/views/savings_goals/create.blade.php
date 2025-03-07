@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Form Card with Enhanced Styling -->
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl animate-fade-in">
            <!-- Enhanced Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-indigo-600 to-purple-600 relative overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white opacity-10"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-16 h-16 rounded-full bg-white opacity-10"></div>
                
                <div class="relative z-10 flex items-center">
                    <div class="bg-white/20 rounded-lg p-2 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl">
                            Créer un Objectif d'Épargne
                        </h2>
                        <p class="mt-2 text-indigo-100 text-sm">Définissez vos objectifs financiers et suivez votre progression</p>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Form -->
            <div class="px-8 py-10">
                <form action="{{ route('savings_goals.store') }}" method="POST">
                    @csrf
                    <div class="space-y-8">
                        <div class="transition-all duration-300 transform hover:-translate-y-1">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom de l'objectif
                            </label>
                            <div class="relative rounded-md group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-600 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1.323l-3.954 1.582A1 1 0 004 6.32V16a1 1 0 001.029.976l5-1V17a1 1 0 102 0v-1.024l5 1A1 1 0 0018 16V6.32a1.001 1.001 0 00-.046-.315L14 4.323V3a1 1 0 10-2 0v1.323L10 3.323V3a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" class="pl-12 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 py-3.5 bg-gray-50 focus:bg-white" placeholder="Ex: Achat maison, Vacances..." required>
                            </div>
                        </div>
                        <input type="hidden" value="{{ session('current_profile') }}" name="profile_id" id="profile_id" required>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="transition-all duration-300 transform hover:-translate-y-1">
                                <label for="target_amount" class="block text-sm font-medium text-gray-700 mb-2">
                                    Montant objectif
                                </label>
                                <div class="relative rounded-md group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-indigo-500 group-hover:text-indigo-600 transition-colors duration-200 font-medium">MAD</span>
                                    </div>
                                    <input type="number" name="target_amount" id="target_amount" class="pl-14 pr-14 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 py-3.5 bg-gray-50 focus:bg-white" placeholder="0.00" step="0.01" required>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">DH</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="transition-all duration-300 transform hover:-translate-y-1">
                                <label for="saved_amount" class="block text-sm font-medium text-gray-700 mb-2">
                                    Montant enregistré
                                </label>
                                <div class="relative rounded-md group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-indigo-500 group-hover:text-indigo-600 transition-colors duration-200 font-medium">MAD</span>
                                    </div>
                                    <input type="number" name="saved_amount" id="saved_amount" class="pl-14 pr-14 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 py-3.5 bg-gray-50 focus:bg-white" placeholder="0.00" step="0.01" required>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">DH</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="transition-all duration-300 transform hover:-translate-y-1">
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                                Date d'échéance
                            </label>
                            <div class="relative rounded-md group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-600 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="date" name="deadline" id="deadline" class="pl-12 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 py-3.5 bg-gray-50 focus:bg-white">
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Buttons -->
                    <div class="mt-12 flex items-center justify-end space-x-6">
                        <a href="{{ route('home',session('current_profile')) }}" class="bg-white py-3.5 px-7 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 hover:shadow-md">
                            Annuler
                        </a>
                        <button type="submit" class="inline-flex justify-center py-3.5 px-7 border border-transparent shadow-md text-sm font-medium rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:-translate-y-1 hover:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Créer l'objectif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animation for fade in */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    /* Custom styles for form elements */
    input[type="text"],
    input[type="number"],
    input[type="date"] {
        transition: all 0.3s ease;
    }
    
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        transform: translateY(-2px);
    }
    
    /* Improved gradient animation */
    .bg-gradient-to-r {
        background-size: 200% 200%;
        animation: gradientAnimation 8s ease infinite;
    }
    
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
    
    /* Hover effect for form groups */
    .group:hover input {
        border-color: #6366f1;
    }
</style>
@endsection
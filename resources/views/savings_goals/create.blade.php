@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
       
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl animate-fade-in">
            
            <div class="px-8 py-6 bg-gradient-to-r from-indigo-600 to-purple-600 relative overflow-hidden">
                
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
            
        
            <div class="px-8 py-10">
                <!-- ADD THIS ERROR DISPLAY SECTION -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-700 border border-red-400 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                        <!-- ENSURE THE PROFILE_ID IS BEING PASSED CORRECTLY -->
                        <input type="hidden" name="profile_id" id="profile_id" value="{{ session('current_profile') }}" required>
                        
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
                                    Montant actuel
                                </label>
                                <div class="relative rounded-md group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-indigo-500 group-hover:text-indigo-600 transition-colors duration-200 font-medium">MAD</span>
                                    </div>
                                    <input type="number" name="saved_amount" id="saved_amount" class="pl-14 pr-14 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 py-3.5 bg-gray-50 focus:bg-white" placeholder="0.00" step="0.01">
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">DH</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all duration-300 transform hover:-translate-y-1">
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                                Date limite
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
                    <div class="mt-12">
                        <button type="submit" class="relative inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl shadow-sm hover:shadow-lg transform transition-all duration-200">
                            <span class="absolute inset-0 rounded-xl opacity-20 bg-gradient-to-r from-indigo-500 to-purple-600"></span>
                            <span class="relative z-10">Créer l'objectif</span>
                        </button>
                        <a href="{{ route('savings_goals.index') }}" class="ml-4 text-sm text-gray-600 hover:text-gray-800 transition-colors duration-200">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

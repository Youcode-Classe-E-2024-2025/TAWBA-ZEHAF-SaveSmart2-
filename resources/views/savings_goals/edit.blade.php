@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-teal-600 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Tableau de bord
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('savings_goals.index') }}" class="ml-1 text-sm font-medium text-gray-600 hover:text-teal-600 transition-colors duration-200 md:ml-2">Objectifs d'épargne</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Modifier l'objectif</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Form Card -->
        <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
            <div class="px-6 py-5 bg-gradient-to-r from-teal-600 to-emerald-600">
                <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl">
                    Modifier l'Objectif
                </h2>
                <p class="mt-2 text-teal-100 text-sm">Ajustez vos objectifs et suivez votre progression</p>
            </div>
            <div class="px-6 py-8 sm:p-8">
                <form action="{{ route('savings_goals.update', $savingsGoal->id) }}" method="POST" class="space-y-8">
                    @csrf 
                    @method('PUT')
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nom de l'objectif
                        </label>
                        <div class="relative rounded-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1.323l-3.954 1.582A1 1 0 004 6.32V16a1 1 0 001.029.976l5-1V17a1 1 0 102 0v-1.024l5 1A1 1 0 0018 16V6.32a1.001 1.001 0 00-.046-.315L14 4.323V3a1 1 0 10-2 0v1.323L10 3.323V3a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="name" id="name" class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-all duration-200 py-3" value="{{ $savingsGoal->name }}" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="target_amount" class="block text-sm font-medium text-gray-700 mb-1">
                                Montant objectif
                            </label>
                            <div class="relative rounded-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">MAD</span>
                                </div>
                                <input type="number" name="target_amount" id="target_amount" class="pl-12 pr-12 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-all duration-200 py-3" value="{{ $savingsGoal->target_amount }}" step="0.01" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">DH</span>
                                </div>
                            </div>
                        </div>
    
                        <div>
                            <label for="saved_amount" class="block text-sm font-medium text-gray-700 mb-1">
                                Montant déjà épargné
                            </label>
                            <div class="relative rounded-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">MAD</span>
                                </div>
                                <input type="number" name="saved_amount" id="saved_amount" class="pl-12 pr-12 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-all duration-200 py-3" value="{{ $savingsGoal->saved_amount }}" step="0.01" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">DH</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">
                            Date d'échéance
                        </label>
                        <div class="relative rounded-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="date" name="deadline" id="deadline" class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 transition-all duration-200 py-3" value="{{ $savingsGoal->deadline ? $savingsGoal->deadline : '' }}">
                        </div>
                    </div>

                    <!-- Progress Visualization -->
                    <div class="bg-gradient-to-r from-gray-50 to-teal-50 p-6 rounded-xl border border-teal-100 shadow-sm">
                        <h4 class="text-base font-medium text-gray-800 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-teal-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Progression actuelle
                        </h4>
                        <div class="relative pt-1">
                            @php
                                $progress = ($savingsGoal->target_amount > 0) ? ($savingsGoal->saved_amount / $savingsGoal->target_amount) * 100 : 0;
                                $progressColor = $progress >= 100 ? 'emerald' : 'teal';
                            @endphp
                            <div class="flex mb-3 items-center justify-between">
                                <div>
                                    <span class="text-sm font-semibold inline-block py-1.5 px-3 rounded-full text-{{ $progressColor }}-700 bg-{{ $progressColor }}-100 border border-{{ $progressColor }}-200">
                                        {{ number_format($savingsGoal->saved_amount, 2) }} MAD
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm font-semibold inline-block py-1.5 px-3 rounded-full text-{{ $progressColor }}-700 bg-{{ $progressColor }}-100 border border-{{ $progressColor }}-200">
                                        {{ round($progress, 1) }}%
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-3 mb-4 text-xs flex rounded-full bg-gray-200">
                                <div style="width: {{ min(100, $progress) }}%" 
                                     class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center rounded-full transition-all duration-500 bg-{{ $progressColor }}-500">
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>0 MAD</span>
                                <span class="font-medium">
                                    Objectif: {{ number_format($savingsGoal->target_amount, 2) }} MAD
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex items-center justify-end space-x-4">
                        <a href="{{ route('savings_goals.index') }}" class="bg-white py-3 px-6 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-200">
                            Annuler
                        </a>
                        <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-200">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styles for form elements */
    input[type="text"],
    input[type="number"],
    input[type="date"] {
        transition: all 0.3s ease;
    }
    
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
        border-color: #0d9488;
        box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.2);
        transform: translateY(-1px);
    }
    
    button[type="submit"] {
        transition: all 0.3s ease;
    }
    
    button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
    }
    
    /* Improved form card */
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
    
    /* Progress bar animation */
    .bg-teal-500, .bg-emerald-500 {
        background-size: 30px 30px;
        background-image: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.15) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, 0.15) 50%,
            rgba(255, 255, 255, 0.15) 75%,
            transparent 75%,
            transparent
        );
        animation: animate-stripes 3s linear infinite;
    }
    
    @keyframes animate-stripes {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 60px 0;
        }
    }
</style>
@endsection
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-indigo-50 to-blue-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Enhanced Header with Export Buttons -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div class="flex items-center mb-6 md:mb-0">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg p-2 mr-3 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-purple-700 to-indigo-700">Vos Objectifs d'Épargne</h2>
            </div>
            <div class="flex flex-wrap gap-3">
                @if(session('current_profile'))
                    <!-- PDF Export Button -->
                    <a href="{{ route('exportGoalsAsPdf.profile', session('current_profile')) }}" 
                    class="inline-flex items-center px-5 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-200 ease-in-out transform hover:-translate-y-1">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Exporter en PDF
                    </a>
                    
                    <!-- CSV Export Button -->
                    <a href="{{ route('exportGoals.profile', session('current_profile')) }}" 
                    class="inline-flex items-center px-5 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200 ease-in-out transform hover:-translate-y-1">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Exporter en CSV
                    </a>
                @endif
                
                <!-- Create New Goal Button -->
                <a href="{{ route('savings_goals.create') }}" 
                   class="inline-flex items-center px-5 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out transform hover:-translate-y-1">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Nouvel Objectif
                </a>
            </div>
        </div>

        <!-- Enhanced Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-lg p-6 flex items-center transition duration-300 ease-in-out hover:shadow-xl transform hover:-translate-y-1 border border-gray-100">
                <div class="rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 p-3 mr-4">
                    <svg class="h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total des objectifs</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $goals->count() }}</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex items-center transition duration-300 ease-in-out hover:shadow-xl transform hover:-translate-y-1 border border-gray-100">
                <div class="rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 p-3 mr-4">
                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Total épargné</p>
                    <p class="text-2xl font-bold text-gray-800">{{ number_format($goals->sum('saved_amount'), 2) }} MAD</p>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 flex items-center transition duration-300 ease-in-out hover:shadow-xl transform hover:-translate-y-1 border border-gray-100">
                <div class="rounded-full bg-gradient-to-br from-purple-100 to-pink-100 p-3 mr-4">
                    <svg class="h-8 w-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Progression moyenne</p>
                    <p class="text-2xl font-bold text-gray-800">
                        @php
                            $avgProgress = $goals->count() > 0 ? 
                                $goals->map(function($goal) {
                                    return ($goal->target_amount > 0) ? ($goal->saved_amount / $goal->target_amount) * 100 : 0;
                                })->avg() : 0;
                        @endphp
                        {{ number_format($avgProgress, 1) }}%
                    </p>
                </div>
            </div>
        </div>

        <!-- Enhanced Goals Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($goals as $goal)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition duration-500 hover:scale-102 hover:shadow-2xl border border-gray-100">
                    <!-- Card Header with Status Badge -->
                    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-5">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-bold text-white truncate">{{ $goal->name }}</h3>
                            @php
                                $progress = ($goal->target_amount > 0) ? ($goal->saved_amount / $goal->target_amount) * 100 : 0;
                                $statusClass = $progress >= 100 ? 'bg-gradient-to-r from-green-500 to-emerald-500' : 'bg-gradient-to-r from-amber-400 to-orange-400';
                                $statusText = $progress >= 100 ? 'Complété' : 'En cours';
                            @endphp
                            <span class="text-xs font-semibold inline-block py-1.5 px-3 uppercase rounded-full text-white {{ $statusClass }}">
                                {{ $statusText }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Montant cible</span>
                                <span class="text-lg font-bold text-indigo-600">{{ number_format($goal->target_amount, 2) }} MAD</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Économisé</span>
                                <span class="text-lg font-bold text-blue-600">{{ number_format($goal->saved_amount, 2) }} MAD</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Restant</span>
                                <span class="text-lg font-bold text-purple-600">{{ number_format(max(0, $goal->target_amount - $goal->saved_amount), 2) }} MAD</span>
                            </div>
                        </div>
                        
                        <!-- Enhanced Progress Bar -->
                        <div class="mt-6">
                            <div class="relative pt-1">
                                <div class="flex mb-2 items-center justify-between">
                                    <div>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-indigo-600 bg-indigo-100">
                                            Progression
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xs font-semibold inline-block text-indigo-600">
                                            {{ round($progress, 1) }}%
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-3 mb-4 text-xs flex rounded-full bg-indigo-100">
                                    <div style="width: {{ min(100, $progress) }}%" 
                                         class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center rounded-full transition-all duration-500 ease-in-out {{ $progress >= 100 ? 'bg-gradient-to-r from-green-500 to-emerald-500' : 'bg-gradient-to-r from-indigo-500 to-blue-500' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Enhanced Action Buttons -->
                        <div class="mt-6 flex justify-between">
                            <a href="{{ route('savings_goals.edit', $goal->id) }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 ease-in-out shadow-sm">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Modifier
                            </a>
                            <form action="{{ route('savings_goals.destroy', $goal->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition duration-200 ease-in-out shadow-sm"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet objectif ?')">
                                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Enhanced Empty State -->
        @if($goals->isEmpty())
        <div class="text-center py-16 bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-blue-100 rounded-full flex items-center justify-center mx-auto">
                <svg class="h-12 w-12 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="mt-6 text-xl font-bold text-gray-900">Aucun objectif d'épargne</h3>
            <p class="mt-2 text-base text-gray-500 max-w-md mx-auto">Commencez par créer votre premier objectif d'épargne pour suivre votre progression financière.</p>
            <div class="mt-8">
                <a href="{{ route('savings_goals.create') }}" class="inline-flex items-center px-5 py-3 border border-transparent shadow-sm text-base font-medium rounded-lg text-white bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:-translate-y-1">
                    <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Créer un objectif
                </a>
            </div>
        </div>
        @endif

        <!-- Enhanced Pagination -->
        <div class="mt-12">
            {{ $goals->links() }}
        </div>
    </div>
</div>

<script>
    // Add animation classes to elements as they scroll into view
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });
        
        document.querySelectorAll('.grid > div').forEach(card => {
            observer.observe(card);
            card.classList.add('opacity-0');
        });
    });
</script>

<style>
    /* Animation keyframes */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    .opacity-0 {
        opacity: 0;
    }
    
    /* Custom scale value */
    .hover\:scale-102:hover {
        transform: scale(1.02);
    }
</style>
@endsection
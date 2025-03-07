@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-blue-50 to-cyan-50">
    <!-- Header Section - Improved with better spacing and shadows -->
    <div class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center py-6 gap-4">
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <span class="bg-indigo-100 text-indigo-700 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </span>
                    Tableau de Bord
                </h1>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nouvelle Catégorie
                    </a>
                    <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nouvelle Transaction
                    </a>
                    <a href="{{ route('savings_goals.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition duration-150 ease-in-out">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Nouveau Goal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards - Improved with better shadows, animations and icons -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition duration-300 ease-in-out hover:shadow-xl hover:translate-y-[-5px]">
                <div class="px-5 py-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl p-3">
                            <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Transactions</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-bold text-gray-900">{{ $totalAmount }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition duration-300 ease-in-out hover:shadow-xl hover:translate-y-[-5px]">
                <div class="px-5 py-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-3">
                            <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Objectifs financiers</dt>
                                <div class="text-2xl font-bold text-gray-900">{{ $objectifinanciers->target_amount ?? ""}} </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition duration-300 ease-in-out hover:shadow-xl hover:translate-y-[-5px]">
                <div class="px-5 py-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-xl p-3">
                            <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Dernière Transaction</dt>
                                <dd class="items-baseline">
                                    <div class="text-2xl font-bold text-gray-900">{{ $lastTransaction->amount ?? 0 }}</div>
                                    <span class="text-xs text-gray-600">Par: {{ $lastTransaction->profile->name ?? ''}}</span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section - Improved with better shadows and spacing -->
        <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Pie Chart Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition duration-300 ease-in-out hover:shadow-xl">
                <div class="px-6 py-5">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <span class="bg-indigo-100 text-indigo-700 p-1.5 rounded-lg mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                        </span>
                        Répartition Saving vs Objectif
                    </h3>
                    <div class="mt-6 h-64">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Budget Progress Card -->
            <div class="bg-white overflow-hidden shadow-lg rounded-2xl border border-gray-100 transition duration-300 ease-in-out hover:shadow-xl">
                <div class="px-6 py-5">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
                        <span class="bg-blue-100 text-blue-700 p-1.5 rounded-lg mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </span>
                        Budget Total
                    </h3>
                    <p class="text-3xl font-bold text-gray-800 mb-6">{{ number_format($totalAmount, 2) }} <span class="text-sm text-gray-500">MAD</span></p>
                    
                    <!-- Besoins (50%) -->
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Besoins (50%)</span>
                            <span class="text-sm font-medium text-gray-700">{{ number_format($budgetOptimization['besoins'], 2) }} MAD</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3.5 overflow-hidden">
                            <div class="bg-indigo-500 h-3.5 rounded-full transition-all duration-500 ease-in-out" style="width: 50%"></div>
                        </div>
                    </div>
                    
                    <!-- Envies (30%) -->
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Envies (30%)</span>
                            <span class="text-sm font-medium text-gray-700">{{ number_format($budgetOptimization['envies'], 2) }} MAD</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3.5 overflow-hidden">
                            <div class="bg-blue-500 h-3.5 rounded-full transition-all duration-500 ease-in-out" style="width: 30%"></div>
                        </div>
                    </div>
                    
                    <!-- Épargne (20%) -->
                    <div class="mb-2">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Épargne (20%)</span>
                            <span class="text-sm font-medium text-gray-700">{{ number_format($budgetOptimization['epargne'], 2) }} MAD</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3.5 overflow-hidden">
                            <div class="bg-cyan-500 h-3.5 rounded-full transition-all duration-500 ease-in-out" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions Table - Improved with better styling -->
        <div class="mt-10 bg-white shadow-lg overflow-hidden rounded-2xl border border-gray-100">
            <div class="border-b border-gray-200 px-6 py-5">
                <h3 class="text-lg leading-6 font-semibold text-gray-900 flex items-center">
                    <span class="bg-cyan-100 text-cyan-700 p-1.5 rounded-lg mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </span>
                    Transactions récentes
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Liste des dernières transactions effectuées</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($transactions as $transaction)
                        <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $transaction->profile->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->type === 'Revenu' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $transaction->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $transaction->type === 'Revenu' ? 'text-green-600' : 'text-red-600' }}">
                                {{ number_format($transaction->amount, 2) }} MAD
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2.5 py-0.5 bg-indigo-50 text-indigo-700 rounded-lg">
                                    {{ $transaction->category->name ?? 'Non catégorisé' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $transaction->created_at->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Scripts pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Configuration des couleurs
    const colors = {
        primary: '#4F46E5', // Indigo
        secondary: '#3B82F6', // Blue
        accent: '#06B6D4', // Cyan
        success: '#10B981', // Green
        danger: '#EF4444', // Red
        warning: '#F59E0B', // Amber
        info: '#3B82F6', // Blue
        purple: '#8B5CF6' // Purple
    };

    // Graphique en Pie Chart
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Saving', 'Objectif'],
            datasets: [{
                data: [{{ $totalAmount }}, {{ $objectifinanciers->target_amount ?? ""}}],
                backgroundColor: [colors.secondary, colors.accent],
                borderColor: ['#FFFFFF', '#FFFFFF'],
                borderWidth: 2,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            family: "'Inter', 'Helvetica', 'Arial', sans-serif",
                            size: 12
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.8)',
                    padding: 12,
                    titleFont: {
                        family: "'Inter', 'Helvetica', 'Arial', sans-serif",
                        size: 14,
                        weight: 'bold'
                    },
                    bodyFont: {
                        family: "'Inter', 'Helvetica', 'Arial', sans-serif",
                        size: 13
                    },
                    cornerRadius: 8
                }
            },
            cutout: '70%',
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    // Graphique en Bar Chart
    const ctxBar = document.getElementById('barChart');
    if (ctxBar) {
        new Chart(ctxBar.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [
                    {
                        label: 'Revenus',
                        data: [12, 19, 3, 5, 2, 3, 8, 14, 10, 15, 9, 33],
                        backgroundColor: colors.success,
                        borderRadius: 6
                    },
                    {
                        label: 'Dépenses',
                        data: [7, 11, 5, 8, 3, 7, 9, 12, 16, 4, 6, 22],
                        backgroundColor: colors.danger,
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                family: "'Inter', 'Helvetica', 'Arial', sans-serif",
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.8)',
                        padding: 12,
                        titleFont: {
                            family: "'Inter', 'Helvetica', 'Arial', sans-serif",
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            family: "'Inter', 'Helvetica', 'Arial', sans-serif",
                            size: 13
                        },
                        cornerRadius: 8
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: "'Inter', 'Helvetica', 'Arial', sans-serif"
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [2, 4]
                        },
                        ticks: {
                            font: {
                                family: "'Inter', 'Helvetica', 'Arial', sans-serif"
                            }
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });
    }
</script>
@endsection